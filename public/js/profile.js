/* LIVA Auth & Profile Module (Design Preview — Local Browser Storage) */
(function () {
  'use strict';
  var L = window.Liva;
  if (!L) return;

  var authMode = 'signin';
  var pendingAuth = {};

  function escapeHtml(value) {
    return L.escape ? L.escape(value) : String(value || '');
  }

  function formatMoney(value) {
    return L.money ? L.money(value) : ('$' + Number(value || 0).toFixed(2));
  }

  function profileUrl() {
    return window.__IS_STATIC__ ? '#profile' : '/profile';
  }

  function loginUrl() {
    return window.__IS_STATIC__ ? '#login' : '/login';
  }

  function firstNameOf(profile) {
    var raw = (profile && profile.name ? String(profile.name).trim() : '') || 'Member';
    return raw.split(/\s+/)[0] || 'Member';
  }

  function initialsOf(profile) {
    var raw = (profile && profile.name ? String(profile.name).trim() : '') || 'L';
    return raw.charAt(0).toUpperCase();
  }

  function createDemoProfile(overrides) {
    var base = {
      name: 'Sophea Alex',
      email: 'sophea.alex@gmail.com',
      phone: '012 345 678',
      address: 'Street 240, Daun Penh',
      city: 'Phnom Penh',
      provider: 'Demo Account',
      skinType: 'Normal',
      hairConcern: 'Hydration & Shine',
      memberSince: 'November 2026'
    };
    return Object.assign(base, overrides || {});
  }

  function saveProfileAndGo(profile, toastText) {
    L.state.profile = createDemoProfile(profile);
    L.save();
    L.updateHeaderProfile();
    if (L.toast && toastText) L.toast(toastText);
    if (window.__IS_STATIC__) {
      L.navigate('#profile');
    } else {
      window.location.href = profileUrl();
    }
  }

  function closeHeaderDropdown() {
    var btn = document.getElementById('liva-header-profile-btn');
    var dropdown = document.getElementById('liva-header-profile-dropdown');
    if (btn) btn.setAttribute('aria-expanded', 'false');
    if (dropdown) dropdown.hidden = true;
  }

  L.updateHeaderProfile = function () {
    var profile = L.state.profile;
    var loginLink = document.getElementById('liva-header-login-link');
    var profileBtn = document.getElementById('liva-header-profile-btn');
    var avatarEl = document.getElementById('liva-header-avatar');
    var firstNameEl = document.getElementById('liva-header-first-name');
    var dropdownName = document.getElementById('liva-dropdown-name');
    var dropdownContact = document.getElementById('liva-dropdown-contact');
    var mobileLink = document.getElementById('liva-mobile-account-link');
    var mobileLabel = document.getElementById('liva-mobile-account-label');

    if (profile) {
      if (loginLink) loginLink.hidden = true;
      if (profileBtn) profileBtn.hidden = false;
      if (avatarEl) avatarEl.textContent = initialsOf(profile);
      if (firstNameEl) firstNameEl.textContent = firstNameOf(profile);
      if (dropdownName) dropdownName.textContent = profile.name || 'LIVA Member';
      if (dropdownContact) dropdownContact.textContent = profile.email || profile.phone || '';
      if (mobileLink) {
        mobileLink.href = mobileLink.dataset.profileUrl || profileUrl();
      }
      if (mobileLabel) {
        mobileLabel.removeAttribute('data-i18n');
        mobileLabel.textContent = firstNameOf(profile) + ' · Profile';
      }
    } else {
      closeHeaderDropdown();
      if (loginLink) loginLink.hidden = false;
      if (profileBtn) profileBtn.hidden = true;
      if (mobileLink) {
        mobileLink.href = mobileLink.dataset.loginUrl || loginUrl();
      }
      if (mobileLabel) {
        mobileLabel.setAttribute('data-i18n', 'signIn');
        mobileLabel.textContent = (L.t && L.t('signIn')) || 'Sign in';
      }
    }
  };

  function showAuthError(id, msg) {
    var el = document.getElementById(id);
    if (el) el.textContent = msg || '';
  }

  function validateAuthForm(form, errorId) {
    if (!form.reportValidity()) return false;
    var nameInput = form.elements.namedItem('name');
    if (nameInput && nameInput.required && nameInput.value.trim().length < 2) {
      showAuthError(errorId, 'Please enter your name.');
      nameInput.focus();
      return false;
    }
    var phoneInput = form.elements.namedItem('phone');
    if (phoneInput) {
      var rawPhone = phoneInput.value.trim();
      var digits = rawPhone.replace(/[^0-9]/g, '');
      if (!/^[+]?[0-9 ]+$/.test(rawPhone) || digits.length < 8 || digits.length > 15) {
        showAuthError(errorId, 'Please enter a valid phone number (8–15 digits).');
        phoneInput.focus();
        return false;
      }
    }
    showAuthError(errorId, '');
    return true;
  }

  function setAuthMode(mode) {
    authMode = mode === 'register' ? 'register' : 'signin';
    var isRegister = authMode === 'register';
    document.querySelectorAll('.liva-auth-mode').forEach(function (btn) {
      var active = btn.dataset.mode === authMode;
      btn.classList.toggle('is-active', active);
      btn.setAttribute('aria-pressed', String(active));
    });

    document.querySelectorAll('.liva-register-field').forEach(function (field) {
      field.hidden = !isRegister;
      field.querySelectorAll('input').forEach(function (input) {
        input.required = isRegister;
      });
    });

    var heading = document.getElementById('liva-auth-heading');
    if (heading) {
      heading.textContent = isRegister
        ? ((L.t && L.t('createDemoProfile')) || 'Create a demo profile.')
        : ((L.t && L.t('welcomeBack')) || 'Welcome back.');
    }
    showAuthError('liva-auth-error', '');
  }

  function hydrateAuthPage() {
    var page = document.querySelector('[data-auth-page]');
    if (!page) return;

    var initialMode = page.dataset.initialMode || 'signin';
    setAuthMode(initialMode);

    var profile = L.state.profile;
    var activeBox = document.getElementById('liva-auth-active-session');
    var credStep = document.getElementById('liva-auth-credentials-step');
    var otpStep = document.getElementById('liva-auth-otp-step');

    if (profile) {
      if (activeBox) activeBox.hidden = false;
      if (credStep) credStep.hidden = true;
      if (otpStep) otpStep.hidden = true;
      var avatar = activeBox && activeBox.querySelector('[data-auth-avatar]');
      var nameEl = activeBox && activeBox.querySelector('[data-auth-name]');
      var contactEl = activeBox && activeBox.querySelector('[data-auth-contact]');
      var providerEl = activeBox && activeBox.querySelector('[data-auth-provider]');
      if (avatar) avatar.textContent = initialsOf(profile);
      if (nameEl) nameEl.textContent = profile.name || 'LIVA Member';
      if (contactEl) contactEl.textContent = profile.email || profile.phone || '';
      if (providerEl) providerEl.textContent = profile.provider ? ('CONNECTED VIA ' + String(profile.provider).toUpperCase()) : 'LOCAL DEMO PROFILE';
    } else {
      if (activeBox) activeBox.hidden = true;
      if (credStep) credStep.hidden = false;
      if (otpStep) otpStep.hidden = true;
    }
  }

  function setPreferenceChips(group, value) {
    document.querySelectorAll('.liva-pref-chip[data-pref-group="' + group + '"]').forEach(function (chip) {
      var active = chip.dataset.prefValue === value;
      chip.classList.toggle('is-active', active);
      chip.setAttribute('aria-pressed', String(active));
    });
    var hiddenInput = document.querySelector('input[name="' + group + '"]');
    if (hiddenInput) hiddenInput.value = value;
  }

  function switchProfileTab(tabName) {
    var target = ['overview', 'details', 'orders'].indexOf(tabName) !== -1 ? tabName : 'overview';
    document.querySelectorAll('.liva-profile-tab').forEach(function (btn) {
      btn.classList.toggle('is-active', btn.dataset.profileTab === target);
    });
    document.querySelectorAll('.liva-profile-panel').forEach(function (panel) {
      panel.hidden = panel.dataset.profilePanel !== target;
    });
  }

  function renderProfileOrders() {
    var listEl = document.getElementById('liva-profile-orders-list');
    var emptyEl = document.getElementById('liva-profile-orders-empty');
    var badgeEl = document.getElementById('liva-orders-badge');
    var sidebarCountEl = document.getElementById('liva-sidebar-orders-count');
    var statOrdersEl = document.getElementById('liva-stat-orders');

    var orders = Array.isArray(L.state.orders) ? L.state.orders : [];
    var countText = orders.length + ' ' + (orders.length === 1 ? 'order' : 'orders');

    if (badgeEl) badgeEl.textContent = countText;
    if (sidebarCountEl) sidebarCountEl.textContent = String(orders.length);
    if (statOrdersEl) statOrdersEl.textContent = String(orders.length);

    if (!listEl || !emptyEl) return;

    if (!orders.length) {
      listEl.innerHTML = '';
      listEl.hidden = true;
      emptyEl.hidden = false;
      return;
    }

    listEl.hidden = false;
    emptyEl.hidden = true;
    listEl.innerHTML = orders.slice().reverse().map(function (order) {
      var itemCount = (order.items || []).reduce(function (sum, item) { return sum + (item.qty || 0); }, 0);
      var created = order.createdAt ? new Date(order.createdAt).toLocaleDateString('en-US', { month: 'short', day: 'numeric', year: 'numeric' }) : 'Recent';
      var orderTotal = (order.items || []).reduce(function (sum, item) { return sum + (item.price || 0) * (item.qty || 0); }, 0);
      var trackingHref = window.__IS_STATIC__ ? ('#tracking/' + encodeURIComponent(order.id)) : ('/tracking?order=' + encodeURIComponent(order.id));

      return '<article class="commerce-history-order">' +
        '<div>' +
          '<a href="' + trackingHref + '">' + escapeHtml(order.id) + '</a>' +
          '<p>' + escapeHtml(created) + ' · ' + itemCount + ' ' + (itemCount === 1 ? 'item' : 'items') + '</p>' +
        '</div>' +
        '<span class="commerce-status">' + escapeHtml(order.status || 'Confirmed') + '</span>' +
        '<strong>' + formatMoney(orderTotal || order.total || 0) + '</strong>' +
        '<button type="button" class="btn btn-secondary commerce-repeat-order" data-order-id="' + escapeHtml(order.id) + '">Add again</button>' +
        '<a class="commerce-history-link" href="' + trackingHref + '" aria-label="Track order ' + escapeHtml(order.id) + '">' + (L.icon ? L.icon('arrow') : '→') + '</a>' +
      '</article>';
    }).join('');
  }

  function hydrateProfilePage() {
    var page = document.querySelector('[data-profile-page]');
    if (!page) return;

    var guestEl = document.getElementById('liva-profile-guest');
    var memberEl = document.getElementById('liva-profile-member');
    var profile = L.state.profile;

    if (!profile) {
      if (guestEl) guestEl.hidden = false;
      if (memberEl) memberEl.hidden = true;
      return;
    }

    if (guestEl) guestEl.hidden = true;
    if (memberEl) memberEl.hidden = false;

    var normalized = createDemoProfile(profile);
    var first = firstNameOf(normalized);

    var setText = function (id, text) {
      var el = document.getElementById(id);
      if (el) el.textContent = text;
    };

    setText('liva-profile-greeting', 'Hello, ' + first + '.');
    setText('liva-sidebar-avatar', initialsOf(normalized));
    setText('liva-sidebar-name', normalized.name || 'LIVA Member');
    setText('liva-sidebar-contact', normalized.email || normalized.phone || '');
    setText('liva-sidebar-provider', normalized.provider ? ('CONNECTED VIA ' + String(normalized.provider).toUpperCase()) : 'LOCAL DEMO PROFILE');

    setText('liva-stat-wishlist', String((L.state.wishlist || []).length));
    setText('liva-stat-skin', normalized.skinType || 'Normal');
    setText('liva-stat-city', normalized.city || 'Phnom Penh');

    setText('liva-overview-name', normalized.name || '—');
    setText('liva-overview-email', normalized.email || 'Not provided');
    setText('liva-overview-phone', normalized.phone || 'Not provided');
    setText('liva-overview-address', normalized.address ? (normalized.address + ', ' + normalized.city) : (normalized.city || 'Not added yet'));
    setText('liva-overview-hair', normalized.hairConcern || 'Hydration & Shine');
    setText('liva-overview-since', 'Preview Member · ' + (normalized.memberSince || 'Active'));

    var form = document.getElementById('liva-profile-details-form');
    if (form) {
      if (form.elements.namedItem('name')) form.elements.namedItem('name').value = normalized.name || '';
      if (form.elements.namedItem('email')) form.elements.namedItem('email').value = normalized.email || '';
      if (form.elements.namedItem('phone')) form.elements.namedItem('phone').value = normalized.phone || '';
      if (form.elements.namedItem('city')) form.elements.namedItem('city').value = normalized.city || 'Phnom Penh';
      if (form.elements.namedItem('address')) form.elements.namedItem('address').value = normalized.address || '';
      setPreferenceChips('skinType', normalized.skinType || 'Normal');
      setPreferenceChips('hairConcern', normalized.hairConcern || 'Hydration & Shine');
    }

    renderProfileOrders();
    switchProfileTab(page.dataset.activeTab || 'overview');
  }

  L.initProfileModule = function () {
    L.updateHeaderProfile();
    hydrateAuthPage();
    hydrateProfilePage();
  };

  document.addEventListener('click', function (event) {
    // Header dropdown toggle
    var profileBtn = event.target.closest('#liva-header-profile-btn');
    if (profileBtn) {
      event.preventDefault();
      var dropdown = document.getElementById('liva-header-profile-dropdown');
      if (dropdown) {
        var nextHidden = !dropdown.hidden;
        dropdown.hidden = nextHidden;
        profileBtn.setAttribute('aria-expanded', String(!nextHidden));
      }
      return;
    }

    if (!event.target.closest('#liva-header-account-menu')) {
      closeHeaderDropdown();
    }

    // Header or Profile sign out
    if (event.target.closest('#liva-header-logout, #liva-profile-logout, #liva-auth-switch-account')) {
      event.preventDefault();
      L.state.profile = null;
      pendingAuth = {};
      L.save();
      L.updateHeaderProfile();
      if (L.toast) L.toast('Signed out of your demo profile.');
      if (document.querySelector('[data-auth-page]')) {
        hydrateAuthPage();
      } else if (document.querySelector('[data-profile-page]')) {
        if (window.__IS_STATIC__) hydrateProfilePage();
        else window.location.href = loginUrl();
      }
      return;
    }

    // Auth page tabs (Sign in / Create a profile)
    var modeBtn = event.target.closest('.liva-auth-mode');
    if (modeBtn) {
      setAuthMode(modeBtn.dataset.mode);
      return;
    }

    // Social quick sign-in -> open Profile
    var socialBtn = event.target.closest('.liva-social-login');
    if (socialBtn) {
      var provider = socialBtn.dataset.social === 'facebook' ? 'Facebook' : 'Google';
      var demoEmail = provider === 'Facebook' ? 'sophea.alex@facebook.com' : 'sophea.alex@gmail.com';
      saveProfileAndGo({
        name: 'Sophea Alex',
        email: demoEmail,
        phone: '012 345 678',
        provider: provider
      }, 'Signed in with ' + provider);
      return;
    }

    // Back from OTP step
    if (event.target.closest('#liva-auth-back-btn')) {
      var credStep = document.getElementById('liva-auth-credentials-step');
      var otpStep = document.getElementById('liva-auth-otp-step');
      if (credStep) credStep.hidden = false;
      if (otpStep) otpStep.hidden = true;
      showAuthError('liva-auth-otp-error', '');
      return;
    }

    // Guest "Preview demo profile" button on /profile
    var loadDemoBtn = event.target.closest('#liva-load-demo-profile');
    if (loadDemoBtn) {
      var payload = {};
      try {
        payload = JSON.parse(loadDemoBtn.dataset.demoProfile || '{}');
      } catch (_) {}
      L.state.profile = createDemoProfile(payload);
      L.save();
      L.updateHeaderProfile();
      hydrateProfilePage();
      if (L.toast) L.toast('Demo profile loaded.');
      return;
    }

    // Profile sidebar tabs & overview jump button
    var tabBtn = event.target.closest('[data-profile-tab], [data-profile-tab-jump]');
    if (tabBtn) {
      var tab = tabBtn.dataset.profileTab || tabBtn.dataset.profileTabJump;
      switchProfileTab(tab);
      var profilePage = document.querySelector('[data-profile-page]');
      if (profilePage) profilePage.dataset.activeTab = tab;
      return;
    }

    // Beauty preference chips
    var prefChip = event.target.closest('.liva-pref-chip');
    if (prefChip) {
      setPreferenceChips(prefChip.dataset.prefGroup, prefChip.dataset.prefValue);
      return;
    }
  });

  document.addEventListener('submit', function (event) {
    var form = event.target;

    // Phone / Register form -> OTP step
    if (form.id === 'liva-auth-form') {
      event.preventDefault();
      if (!validateAuthForm(form, 'liva-auth-error')) return;
      var data = Object.fromEntries(new FormData(form).entries());
      pendingAuth = {
        phone: (data.phone || '').trim(),
        name: (data.name || '').trim(),
        email: (data.email || '').trim()
      };
      var credStep = document.getElementById('liva-auth-credentials-step');
      var otpStep = document.getElementById('liva-auth-otp-step');
      var targetEl = document.getElementById('liva-auth-otp-target');
      if (credStep) credStep.hidden = true;
      if (otpStep) otpStep.hidden = false;
      if (targetEl) targetEl.textContent = 'Enter the preview code for ' + pendingAuth.phone + '.';
      var otpInput = document.getElementById('liva-auth-otp');
      if (otpInput) otpInput.focus();
      return;
    }

    // OTP form -> Create profile & redirect to /profile
    if (form.id === 'liva-auth-otp-form') {
      event.preventDefault();
      var otpVal = (form.elements.otp && form.elements.otp.value || '').trim();
      if (otpVal !== '123456') {
        showAuthError('liva-auth-otp-error', 'Use the demo code 123456 shown above.');
        return;
      }
      showAuthError('liva-auth-otp-error', '');
      saveProfileAndGo({
        name: pendingAuth.name || 'LIVA Guest',
        email: pendingAuth.email || '',
        phone: pendingAuth.phone || '012 345 678',
        address: '',
        city: 'Phnom Penh',
        provider: 'Phone Demo'
      }, 'Welcome! Your profile is ready.');
      return;
    }

    // Profile details & preferences save
    if (form.id === 'liva-profile-details-form') {
      event.preventDefault();
      if (!validateAuthForm(form, 'liva-profile-error')) return;
      var values = Object.fromEntries(new FormData(form).entries());
      Object.keys(values).forEach(function (k) {
        values[k] = typeof values[k] === 'string' ? values[k].trim() : values[k];
      });
      L.state.profile = Object.assign({}, L.state.profile || {}, values);
      L.save();
      L.updateHeaderProfile();
      hydrateProfilePage();
      switchProfileTab('details');
      var savedBadge = document.getElementById('liva-profile-saved');
      if (savedBadge) savedBadge.textContent = 'Profile changes saved on this device.';
      if (L.toast) L.toast('Profile details updated.');
    }
  });

  document.addEventListener('keydown', function (event) {
    if (event.key === 'Escape') {
      closeHeaderDropdown();
    }
  });

  document.addEventListener('liva:change', function () {
    L.updateHeaderProfile();
    if (document.querySelector('[data-profile-page]')) {
      var wishlistStat = document.getElementById('liva-stat-wishlist');
      if (wishlistStat) wishlistStat.textContent = String((L.state.wishlist || []).length);
    }
  });

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', L.initProfileModule);
  } else {
    L.initProfileModule();
  }
})();
