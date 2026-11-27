(function (window, $) {
  'use strict';
  const L = window.Liva, icon = L.icon;
  let editCategory = 'hair';
  const categoryNames = {
    'skin-care': 'Skin Care',
    makeup: 'Makeup',
    hair: 'Hair care',
    fragrances: 'Fragrances',
    'nail-care': 'Nail Care',
    body: 'Body care',
    sets: 'Sets'
  };
  function editProducts() {
    return L.products.filter(p => p.category === editCategory).slice(0, 6).map(L.productCard).join('');
  }
  function home() {
    return `${L.renderHero()}
    <nav class="category-index container" aria-label="Shop by category"><a href="#shop?category=hair"><div><h2>${L.t('hair')}</h2><p>${L.getLang && L.getLang() === 'km' ? 'សាប៊ូកក់សក់ បន្ទន់សក់ និងច្រើនទៀត' : 'Shampoo, conditioner & more'}</p></div><img src="${L.asset('assets/conditioner.webp')}" alt="" width="150" height="150">${icon('arrow')}</a><a href="#shop?category=body"><div><h2>${L.t('body')}</h2><p>${L.getLang && L.getLang() === 'km' ? 'ពីបន្ទប់ទឹក ដល់កន្លែងដាក់សម្ភារៈរបស់អ្នក' : 'From your shower to your shelf'}</p></div><img src="${L.asset('assets/body-wash.webp')}" alt="" width="150" height="150">${icon('arrow')}</a><a href="#shop?category=sets"><div><h2>${L.t('sets')}</h2><p>${L.getLang && L.getLang() === 'km' ? 'បណ្តុំផលិតផលរួមគ្នា' : 'A few things, together'}</p></div><img src="${L.asset('assets/ritual-duo.webp')}" alt="" width="150" height="150">${icon('arrow')}</a></nav>
    <section class="daily-selection container"><div class="section-heading"><div><span class="eyebrow">${L.getLang && L.getLang() === 'km' ? 'ជួបជាមួយទំនិញប្រចាំថ្ងៃ' : 'MEET YOUR EVERYDAY'}</span><h2>${L.getLang && L.getLang() === 'km' ? 'ស្វែងរកអ្វីដែលជា <em>ប្រចាំថ្ងៃរបស់អ្នក។</em>' : 'Find your <em>everyday.</em>'}</h2></div><div class="selection-intro"><p>${L.getLang && L.getLang() === 'km' ? 'ចាប់ផ្តើមជាមួយអ្វីដែលអ្នកត្រូវការ។<br>ទុកកន្លែងសម្រាប់អ្វីផ្សេងទៀត។' : 'Start with what you came for.<br>Make room for something else.'}</p></div></div><div class="edit-layout"><aside class="edit-navigation"><div class="edit-tabs" role="group" aria-label="Choose a product edit"><button data-edit="hair" aria-pressed="true" class="active">${L.t('hairCare')}</button><button data-edit="body" aria-pressed="false">${L.t('bodyCare')}</button><button data-edit="sets" aria-pressed="false">${L.t('sets')}</button></div><div class="edit-note"><span class="eyebrow">${L.getLang && L.getLang() === 'km' ? 'មើលឱ្យកាន់តែជិត' : 'A CLOSER LOOK'}</span><p>${L.getLang && L.getLang() === 'km' ? 'ទំហំ តម្លៃ ទម្រង់។<br>ព័ត៌មានលម្អិតជួយឱ្យអ្នកជ្រើសរើស។' : 'Size, price, format.<br>The details that help you choose.'}</p></div></aside><div><div class="home-product-grid" id="home-products" aria-live="polite">${editProducts()}</div><div id="comparison-tray">${L.renderComparisonTray()}</div><div class="home-all-products-footer"><a href="#shop" class="text-link"><span data-i18n="allProducts">${L.getLang && L.getLang() === 'km' ? 'ទំនិញទាំងអស់' : 'All products'}</span> ${icon('arrow')}</a></div></div></div></section>
    <section class="shelf-feature container"><div class="shelf-feature-art"><img src="${L.asset('assets/daily-edit-detail.webp')}" alt="A hand reaching for a personal care bottle on a sunlit terracotta ledge" loading="lazy" width="1536" height="1024"><span class="image-note">${L.getLang && L.getLang() === 'km' ? 'ធ្វើឱ្យវាក្លាយជាជម្រើសផ្ទាល់ខ្លួន។' : 'MAKE IT A PERSONAL SELECTION.'}</span></div><div class="shelf-feature-copy"><span class="eyebrow">${L.getLang && L.getLang() === 'km' ? 'រៀបចំដោយអ្នកផ្ទាល់' : 'CURATED BY YOU'}</span><h2>${L.getLang && L.getLang() === 'km' ? 'កញ្ចប់ដែលបង្ហាញពី<br><em>រូបអ្នក។</em>' : 'A shelf that<br>feels like <em>you.</em>'}</h2><p>${L.getLang && L.getLang() === 'km' ? 'ឈុតថែរក្សាសក់ ឬដងខ្លួន ឬទាំងពីររួមគ្នា។<br>ជ្រើសរើសរបស់ចាំបាច់ដែលអ្នកចង់បាន មើលតម្លៃសរុប<br class="desktop-break"> និងដាក់បញ្ចូលគ្នាក្នុងកន្ត្រកតែមួយ។' : 'A hair pair, a body duo, or a little of both.<br>Choose the essentials you want, see your total,<br class="desktop-break"> and bring them together in one bag.'}</p><a href="#routine" class="btn btn-primary">${L.t('buildYourShelf')} ${icon('plus')}</a><span class="shelf-footnote">${L.getLang && L.getLang() === 'km' ? 'មិនមានរូបមន្តកំណត់ទុកជាមុន។ គ្រាន់តែជាជម្រើសរបស់អ្នក។' : 'NO SET ROUTINE. JUST YOUR SELECTION.'}</span></div></section>
    <section class="brand-statement container"><span class="eyebrow">${L.getLang && L.getLang() === 'km' ? 'នេះគឺ LIVA' : 'THIS IS LIVA'}</span><h2>${L.getLang && L.getLang() === 'km' ? 'ការថែទាំជារឿងផ្ទាល់ខ្លួន។<br><em>រក្សាវាបែបនោះជានិច្ច។</em>' : 'Care is personal.<br><em>Let’s keep it that way.</em>'}</h2><div><p>${L.getLang && L.getLang() === 'km' ? 'សម្រាប់ការងូតទឹកដំបូងនៃថ្ងៃ ខណៈពេលដ៏ស្ងប់ស្ងាត់បន្ទាប់ពីថ្ងៃដ៏យូរ និងអ្វីៗដែលជាជីវិតប្រចាំថ្ងៃរបស់អ្នក។' : 'For the first shower of the day, the quiet moment after a long one, and whatever everyday looks like to you.'}</p><a class="text-link" href="#about">${L.getLang && L.getLang() === 'km' ? 'ស្វែងយល់បន្ថែមអំពី LIVA' : 'A little more about LIVA'} ${icon('arrow')}</a></div></section>
    <section class="cat-product-videos container" aria-label="Product video reels"><div class="cat-video-grid"><div class="cat-video-card"><video src="${L.asset('media/videos/video-1.mp4')}" poster="${L.asset('media/videos/thumb1.jpg')}" playsinline webkit-playsinline loop muted autoplay preload="metadata"></video><button type="button" class="cat-video-sound-toggle" aria-label="Toggle sound"><svg class="sound-off-icon" viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polygon points="11 5 6 9 2 9 2 15 6 15 11 19 11 5"></polygon><line x1="23" y1="9" x2="17" y2="15"></line><line x1="17" y1="9" x2="23" y2="15"></line></svg><svg class="sound-on-icon" viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" style="display: none;"><polygon points="11 5 6 9 2 9 2 15 6 15 11 19 11 5"></polygon><path d="M19.07 4.93a10 10 0 0 1 0 14.14M15.54 8.46a5 5 0 0 1 0 7.07"></path></svg></button><div class="cat-video-play-indicator" aria-hidden="true"><svg viewBox="0 0 24 24" width="32" height="32" fill="currentColor"><polygon points="6 4 20 12 6 20 6 4"></polygon></svg></div></div><div class="cat-video-card"><video src="${L.asset('media/videos/video-2.mp4')}" poster="${L.asset('media/videos/thumb2.jpg')}" playsinline webkit-playsinline loop muted autoplay preload="metadata"></video><button type="button" class="cat-video-sound-toggle" aria-label="Toggle sound"><svg class="sound-off-icon" viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polygon points="11 5 6 9 2 9 2 15 6 15 11 19 11 5"></polygon><line x1="23" y1="9" x2="17" y2="15"></line><line x1="17" y1="9" x2="23" y2="15"></line></svg><svg class="sound-on-icon" viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" style="display: none;"><polygon points="11 5 6 9 2 9 2 15 6 15 11 19 11 5"></polygon><path d="M19.07 4.93a10 10 0 0 1 0 14.14M15.54 8.46a5 5 0 0 1 0 7.07"></path></svg></button><div class="cat-video-play-indicator" aria-hidden="true"><svg viewBox="0 0 24 24" width="32" height="32" fill="currentColor"><polygon points="6 4 20 12 6 20 6 4"></polygon></svg></div></div><div class="cat-video-card"><video src="${L.asset('media/videos/video-3.mp4')}" poster="${L.asset('media/videos/thumb3.jpg')}" playsinline webkit-playsinline loop muted autoplay preload="metadata"></video><button type="button" class="cat-video-sound-toggle" aria-label="Toggle sound"><svg class="sound-off-icon" viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polygon points="11 5 6 9 2 9 2 15 6 15 11 19 11 5"></polygon><line x1="23" y1="9" x2="17" y2="15"></line><line x1="17" y1="9" x2="23" y2="15"></line></svg><svg class="sound-on-icon" viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" style="display: none;"><polygon points="11 5 6 9 2 9 2 15 6 15 11 19 11 5"></polygon><path d="M19.07 4.93a10 10 0 0 1 0 14.14M15.54 8.46a5 5 0 0 1 0 7.07"></path></svg></button><div class="cat-video-play-indicator" aria-hidden="true"><svg viewBox="0 0 24 24" width="32" height="32" fill="currentColor"><polygon points="6 4 20 12 6 20 6 4"></polygon></svg></div></div><div class="cat-video-card"><video src="${L.asset('media/videos/video-4.mp4')}" poster="${L.asset('media/videos/thumb4.jpg')}" playsinline webkit-playsinline loop muted autoplay preload="metadata"></video><button type="button" class="cat-video-sound-toggle" aria-label="Toggle sound"><svg class="sound-off-icon" viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polygon points="11 5 6 9 2 9 2 15 6 15 11 19 11 5"></polygon><line x1="23" y1="9" x2="17" y2="15"></line><line x1="17" y1="9" x2="23" y2="15"></line></svg><svg class="sound-on-icon" viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" style="display: none;"><polygon points="11 5 6 9 2 9 2 15 6 15 11 19 11 5"></polygon><path d="M19.07 4.93a10 10 0 0 1 0 14.14M15.54 8.46a5 5 0 0 1 0 7.07"></path></svg></button><div class="cat-video-play-indicator" aria-hidden="true"><svg viewBox="0 0 24 24" width="32" height="32" fill="currentColor"><polygon points="6 4 20 12 6 20 6 4"></polygon></svg></div></div></div></section>`;
  }
  function about() {
    return `<section class="about-page"><div class="about-intro container"><span class="eyebrow">THE LIVA POINT OF VIEW</span><h1>Personal care.<br><span>Personally yours.</span></h1><p>A place for hair care, body care,<br>and a little space for yourself.</p></div><div class="about-image"><img src="${L.asset('assets/daily-edit-detail.webp')}" alt="Sunlight falling across a personal care bottle and terracotta tiles" width="1536" height="1024"></div><div class="about-body container"><span class="eyebrow">THE DAILY EDIT</span><div><h2>Everyday is<br>where it begins.</h2><p>The LIVA collection brings shampoo, conditioner, shower essentials and body care into one simple edit. Explore by category, compare the details, or put together a shelf of your own.</p><p>There’s no prescribed version of the perfect routine here. Start with the things you need. Make your selection personal.</p><a href="#shop" class="btn btn-primary">Explore the collection ${icon('arrow')}</a></div></div></section>`;
  }
  function information(page) {
    const content = {
      shipping: { title: 'Delivery & returns', label: 'BEFORE YOU ORDER', body: '<h2>Details are being confirmed.</h2><p>Delivery coverage, fees, timing and returns conditions have not been supplied for this preview. No delivery or returns service is offered through this demo.</p><p>You can explore the address form and the order tracking interface. Saving a demo order does not arrange delivery. Approved store policies will be needed before a live launch.</p>' },
      privacy: { title: 'Your saved information', label: 'ABOUT THIS PREVIEW', body: '<h2>On this device.</h2><p>Your shopping bag, saved products, demo profile and demo orders are stored in this browser. No account server, analytics or payment service is connected.</p><p>The contact form only shows a confirmation; it does not send or store your message. Use sample information while exploring account and checkout screens.</p><h2>You’re in control.</h2><p>Clear this site’s browser data to remove saved information. This describes the prototype’s behavior, not a privacy policy for a future live store.</p>' },
      terms: { title: 'The LIVA preview', label: 'A COLLECTION IN PROGRESS', body: '<h2>A working design preview.</h2><p>This frontend demonstrates product discovery, comparison, saved items, a personal shelf, shopping bag, account, checkout and order history.</p><p>Product imagery, names, sizes and prices are illustrative. Ingredients, use instructions and product benefits require approved brand information. No customer ratings, reviews or certifications are presented.</p><h2>No purchase is made.</h2><p>Accounts, payment selections and orders are demonstrations. No SMS is sent, no payment is collected, no stock is reserved and no order is delivered. Delivery and returns policies and live customer care channels are not configured.</p>' }
    }[page];
    return `<section class="information-page container"><span class="eyebrow">${content.label}</span><h1>${content.title}</h1><div class="prose">${content.body}<a class="text-link" href="#contact">Help & contact ${icon('arrow')}</a></div></section>`;
  }
  function notFound() { return `<section class="container empty-state"><span class="eyebrow">PAGE NOT FOUND</span><h1>A fresh start?</h1><p>This page isn’t part of the collection.</p><a href="#shop" class="btn btn-primary">Explore the collection ${icon('arrow')}</a></section>`; }
  L.updateCounts = function () {
    const totals = L.cartTotals(); $('.bag-count').text(totals.count);
    $('.bag-toggle').attr('aria-label', `Shopping bag, ${totals.count} ${totals.count === 1 ? 'item' : 'items'}`);
    $('.wishlist-count').text(L.state.wishlist.length).prop('hidden', !L.state.wishlist.length);
  };
  let isInitialLoad = true;
  L.render = function (forceRender) {
    if (L.destroyHero) L.destroyHero();
    let raw = window.location.hash.slice(1);
    const p = window.__IS_STATIC__ ? '' : window.location.pathname.replace(/^\/|\/$/g, '');
    const currentRoute = p || 'home';
    let page = currentRoute.split('/')[0];
    let id = currentRoute.split('/')[1];

    if (!window.__IS_STATIC__ && raw && !['main-content', 'app', 'shop-main', 'liva-campaign'].includes(raw)) {
      const [hashPath, hashQuery] = raw.split('?');
      const [hashPage, hashId] = hashPath.split('/');
      const knownPages = ['home', 'shop', 'product', 'routine', 'about', 'contact', 'shipping', 'privacy', 'terms', 'wishlist', 'compare', 'account', 'login', 'register', 'profile', 'tracking', 'checkout'];
      if (knownPages.includes(hashPage)) {
        const targetUrl = (hashPage === 'home' ? '/' : '/' + hashPage) + (hashId ? '/' + hashId : '') + (hashQuery ? '?' + hashQuery : '');
        if (window.location.pathname !== (hashPage === 'home' ? '/' : '/' + hashPage) && window.location.pathname !== '/' + hashPage + '/' + hashId) {
          window.location.href = targetUrl;
          return;
        }
      }
    }

    const isAnchor = ['main-content', 'app', 'shop-main', 'liva-campaign'].includes(raw);
    const [path, query] = (!isAnchor && raw ? raw : currentRoute).split('?');
    if (window.__IS_STATIC__ || (!isAnchor && raw) || !p) {
      const parts = path.split('/');
      page = parts[0];
      id = parts[1];
    }
    const params = new URLSearchParams(query || (window.location.search ? window.location.search.slice(1) : ''));
    let html = '';
    const dynamicPages = ['account', 'shop', 'wishlist', 'compare', 'tracking', 'checkout'];
    const isDynamicPage = dynamicPages.includes(page);
    const hasPreRenderedContent = isInitialLoad && $('#app').children().length > 0 && !forceRender && !isDynamicPage;
    isInitialLoad = false;

    if (!hasPreRenderedContent || forceRender || isDynamicPage) {
      switch (page) {
        case 'home': editCategory = 'hair'; html = home(); break;
        case 'shop': html = L.renderShop(params); break;
        case 'product': html = L.renderProduct(id); break;
        case 'compare': html = L.renderCompare(); break;
        case 'routine': html = L.renderRoutine(); break;
        case 'wishlist': html = L.renderWishlist(); break;
        case 'checkout': html = L.renderCheckout(); break;
        case 'account': html = L.renderAccount(); break;
        case 'tracking': html = L.renderTracking(id); break;
        case 'contact': html = L.renderContact(); break;
        case 'confirmation': html = L.renderConfirmation(id); break;
        case 'about': case 'journal': html = about(); break;
        case 'shipping': case 'privacy': case 'terms': html = information(page); break;
        default: html = notFound();
      }
      $('#app').html(html);
    }
    document.body.dataset.page = page;
    let targetNav = (page === 'product' ? 'shop' : page);
    if (page === 'shop') {
      const promoVal = params.get('promo');
      if (promoVal === 'new-arrival') {
        targetNav = 'new-arrival';
      } else if (promoVal === 'best-seller') {
        targetNav = 'best-seller';
      } else if (promoVal === 'on-sale' || promoVal === 'promotion' || promoVal === 'promotions') {
        targetNav = 'promotion';
      } else if (!params.get('category')) {
        targetNav = 'shop';
      } else {
        targetNav = null;
      }
    }
    $('[data-nav]').removeClass('active').removeAttr('aria-current');
    if (targetNav) {
      $('[data-nav]').filter(function () { return this.dataset.nav === targetNav; }).addClass('active').attr('aria-current', 'page');
    }
    const promoTitles = { 'new-arrival': 'New Arrivals', 'best-seller': 'Best Sellers', 'on-sale': 'Promotions', 'promotion': 'Promotions', 'promotions': 'Promotions' };
    const labels = { shop: promoTitles[params.get('promo')] || categoryNames[params.get('category')] || 'The collection', product: L.getProduct(id)?.name || 'Product', routine: 'Build your shelf', compare: 'Compare products', wishlist: 'Saved products', checkout: 'Checkout', account: 'Your account', login: 'Sign in', register: 'Create profile', profile: 'My profile', tracking: 'Order tracking', contact: 'Help & contact', confirmation: 'Order saved', about: 'About LIVA', shipping: 'Delivery & returns', privacy: 'Privacy', terms: 'About this preview' };
    document.title = page === 'home' ? 'LIVA — The Daily Edit' : `${labels[page] || 'Explore'} — LIVA`;
    L.updateCounts(); if (L.initCatalogPage) L.initCatalogPage(); if (L.initHero) L.initHero(); if (L.initProfileModule) L.initProfileModule();
    syncLanguage(L.getLang ? L.getLang() : 'en');
  };
  function syncLanguage(lang) {
    lang = (lang === 'km' || lang === 'en') ? lang : (L.getLang ? L.getLang() : 'en');
    $('html').attr('lang', lang);
    $('[data-lang]').each(function () {
      const isTarget = this.dataset.lang === lang;
      $(this).toggleClass('active', isTarget).attr('aria-pressed', String(isTarget));
    });
    $('[data-i18n]').each(function () {
      const key = this.dataset.i18n;
      const translation = L.t(key);
      if (translation) {
        this.textContent = translation;
      }
    });
    const searchInput = $('#header-search-input');
    if (searchInput.length) {
      searchInput.attr('placeholder', lang === 'km' ? 'ស្វែងរកផលិតផល ថែរក្សាសក់ ថែរក្សាស្បែក...' : 'Search products, hair care, body care...');
    }
    const mobileSearchInput = $('.mobile-nav-search-input');
    if (mobileSearchInput.length) {
      mobileSearchInput.attr('placeholder', lang === 'km' ? 'ស្វែងរកផលិតផល...' : 'Search products, rituals…');
    }
  }
  function closeNavigation() {
    $('.mobile-nav,.header-search').prop('hidden', true);
    $('.mobile-menu-toggle,.header-actions .search-toggle').attr('aria-expanded', 'false');
    $('.mobile-menu-toggle').attr('aria-label', 'Open menu').html(icon('menu'));
    $('body').removeClass('menu-open');
  }
  $(function () {
    $('[data-icon]').each(function () { this.innerHTML = icon(this.dataset.icon); });
    L.state.cart = L.state.cart.filter(item => L.getProduct(item.id));
    L.state.wishlist = L.state.wishlist.filter(id => L.getProduct(id));
    syncLanguage(L.getLang ? L.getLang() : 'en');
    L.render();
    $(document).on('click', '[data-lang]', function (e) {
      e.preventDefault();
      const newLang = this.dataset.lang;
      if (newLang && (newLang === 'en' || newLang === 'km')) {
        L.setLang(newLang);
        syncLanguage(newLang);
        L.render(true);
      }
    });
    $(document).on('liva:lang-changed', function (e) {
      const lang = (e.detail && e.detail.lang) || (L.getLang ? L.getLang() : 'en');
      syncLanguage(lang);
      L.render(true);
    });
    let previousPath = (window.location.hash || '#home').split('?')[0];
    $(window).on('hashchange', function () {
      const focused = document.activeElement, focusId = focused && focused.id;
      const path = (window.location.hash || '#home').split('?')[0];
      if (path === '#main-content') { document.getElementById('main-content').focus(); return; }
      closeNavigation();
      if (L.closeCart) L.closeCart();
      if (!window.__IS_STATIC__) {
        const knownPages = ['shop', 'product', 'routine', 'about', 'contact', 'shipping', 'privacy', 'terms', 'wishlist', 'compare', 'account', 'login', 'register', 'profile', 'tracking', 'checkout'];
        const targetPage = path.slice(1).split('/')[0];
        if (knownPages.includes(targetPage)) {
          const currentPath = window.location.pathname.replace(/^\/|\/$/g, '');
          if (currentPath !== path.slice(1)) {
            window.location.href = '/' + path.slice(1);
            return;
          }
        }
      }
      L.render(true);
      if (path !== previousPath) {
        window.scrollTo({ top: 0, behavior: 'instant' });
        document.getElementById('main-content').focus({ preventScroll: true });
      } else if (path === '#shop') {
        const control = focusId && document.getElementById(focusId);
        if (control) control.focus({ preventScroll: true });
        else document.getElementById('main-content').focus({ preventScroll: true });
      }
      previousPath = path;
    });
    $(document).on('liva:change liva:cart-updated', L.updateCounts);
    $('.mobile-nav a,.header-search a').on('click', closeNavigation);
    $('.bag-toggle').on('click', () => { closeNavigation(); L.openCart(); });
    $('.mobile-menu-toggle').on('click', function () {
      const isHidden = $('.mobile-nav').prop('hidden');
      closeNavigation();
      if (isHidden) {
        const headerEl = document.querySelector('.site-header');
        if (headerEl) {
          const headerBottom = headerEl.getBoundingClientRect().bottom;
          document.documentElement.style.setProperty('--mobile-header-bottom', headerBottom + 'px');
        }
        $('.mobile-nav').prop('hidden', false);
        $(this).attr({ 'aria-expanded': 'true', 'aria-label': 'Close menu' }).html(icon('close'));
        $('body').addClass('menu-open');
      }
    });
    function escapeHtml(str) {
      return (str || '').replace(/[&<>"']/g, c => ({ '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#39;' }[c]));
    }

    function highlightMatch(text, query) {
      if (!query) return escapeHtml(text);
      const escaped = escapeHtml(text);
      const safeQuery = query.replace(/[-[\]{}()*+?.,\\^$|#\s]/g, '\\$&');
      const regex = new RegExp('(' + safeQuery + ')', 'gi');
      return escaped.replace(regex, '<mark>$1</mark>');
    }

    function updateLiveSearch(q) {
      const query = (q || '').trim();
      const clearBtn = $('#header-search-clear');
      if (query.length > 0) {
        clearBtn.prop('hidden', false);
      } else {
        clearBtn.prop('hidden', true);
      }

      const results = $('#search-live-results');
      const emptyState = $('#search-empty-state');
      const resultsGrid = $('#search-results-grid');
      const resultsCount = $('#search-results-count');
      const viewAllText = $('#search-view-all-text');

      if (!query) {
        results.prop('hidden', true);
        emptyState.prop('hidden', true);
        return;
      }

      const products = Array.isArray(L.products) ? L.products : [];
      const qLower = query.toLowerCase();

      const matches = products.filter(p => {
        const name = (p.name || '').toLowerCase();
        const category = (p.category || '').toLowerCase();
        const desc = (p.description || '').toLowerCase();
        const contents = (p.contents || '').toLowerCase();
        const size = (p.size || '').toLowerCase();
        return name.includes(qLower) || category.includes(qLower) || desc.includes(qLower) || contents.includes(qLower) || size.includes(qLower);
      });

      if (matches.length > 0) {
        const isKm = L.getLang && L.getLang() === 'km';
        resultsCount.text(isKm ? `ផលិតផល (${matches.length})` : `PRODUCTS (${matches.length} FOUND)`);
        viewAllText.text(isKm ? `មើលផលិតផលទាំង ${matches.length} ក្នុងហាង →` : `View all ${matches.length} matching products →`);

        const assetHelper = path => L.asset ? L.asset(path) : (path ? '/' + path.replace(/^\//, '') : '');

        const cardsHtml = matches.slice(0, 6).map(p => {
          const productUrl = (window.__IS_STATIC__ ? '#' : '/') + 'product/' + p.id;
          const catLabel = (L.t && L.t(p.category)) || p.category || 'Product';
          const highlightedTitle = highlightMatch(p.name, query);
          const thumbSrc = assetHelper(p.image);
          const price = L.money ? L.money(p.price) : ('$' + Number(p.price || 0).toFixed(2));
          const size = p.size ? `<span>·</span> ${escapeHtml(p.size)}` : '';

          return `
              <a href="${productUrl}" class="search-product-item" data-product-id="${p.id}">
                <img src="${thumbSrc}" alt="${escapeHtml(p.name)}" class="search-product-thumb" width="58" height="58" loading="lazy">
                <div class="search-product-details">
                  <span class="search-product-category">${escapeHtml(catLabel)}</span>
                  <strong class="search-product-title">${highlightedTitle}</strong>
                  <div class="search-product-meta">
                    <span class="search-product-price">${price}</span>
                    ${size}
                  </div>
                </div>
                ${L.icon ? L.icon('arrow') : '<span class="search-product-arrow">→</span>'}
              </a>
            `;
        }).join('');

        resultsGrid.html(cardsHtml);
        results.prop('hidden', false);
        emptyState.prop('hidden', true);
      } else {
        results.prop('hidden', true);
        emptyState.prop('hidden', false);
      }
    }

    function performSearch(query) {
      const q = (query || '').trim();
      closeNavigation();
      if (window.__IS_STATIC__) {
        L.navigate('#shop' + (q ? '?q=' + encodeURIComponent(q) : ''));
      } else {
        window.location.href = '/shop' + (q ? '?q=' + encodeURIComponent(q) : '');
      }
    }

    $('.search-toggle').on('click', function () {
      const isHidden = $('.header-search').prop('hidden');
      closeNavigation();
      if (isHidden) {
        $('.header-search').prop('hidden', false);
        $('.header-actions .search-toggle').attr('aria-expanded', 'true');
        setTimeout(() => {
          $('#header-search-input').trigger('focus');
        }, 50);
      } else {
        $('.header-actions .search-toggle').trigger('focus');
      }
    });

    $(document).on('click', function (e) {
      if (!$(e.target).closest('.site-header').length) {
        if (!$('.header-search').prop('hidden')) {
          closeNavigation();
        }
      }
    });

    $('#header-search-input').on('input', function () {
      updateLiveSearch($(this).val());
    });

    $('#header-search-clear').on('click', function (e) {
      e.preventDefault();
      const input = $('#header-search-input');
      input.val('');
      updateLiveSearch('');
      input.trigger('focus');
    });

    $(document).on('click', '.search-tag-chip', function (e) {
      e.preventDefault();
      const term = $(this).data('search-term');
      if (term) {
        $('#header-search-input').val(term);
        updateLiveSearch(term);
        performSearch(term);
      }
    });

    $(document).on('click', '.search-product-item, .search-cat-card', function () {
      closeNavigation();
    });

    $('#search-form').on('submit', function (e) {
      e.preventDefault();
      const q = $('#header-search-input').val().trim();
      performSearch(q);
    });

    $(document).on('submit', '.mobile-nav-search-form', function (e) {
      e.preventDefault();
      const q = $(this).find('input').val().trim();
      performSearch(q);
    });

    $(document).on('keydown', function (e) {
      if (e.key === 'Escape') {
        const searchOpen = !$('.header-search').prop('hidden'), menuOpen = !$('.mobile-nav').prop('hidden');
        closeNavigation();
        if (searchOpen) $('.header-actions .search-toggle').trigger('focus');
        else if (menuOpen) $('.mobile-menu-toggle').trigger('focus');
      }
    });
    $(document).on('click', '[data-edit]', function () {
      editCategory = this.dataset.edit;
      $('[data-edit]').removeClass('active').attr('aria-pressed', 'false');
      $(this).addClass('active').attr('aria-pressed', 'true');
      if ($('#home-products .home-card-wrapper').length) {
        $('#home-products .home-card-wrapper').each(function () {
          const match = $(this).data('category') === editCategory;
          $(this).toggle(match);
        });
      } else {
        $('#home-products').html(editProducts());
      }
      if (L.initCatalogPage) L.initCatalogPage();
    });
    $('.skip-link').on('click', function (e) {
      e.preventDefault();
      document.getElementById('main-content').focus();
    });

    function initAnnouncementTimer() {
      const timerEl = document.getElementById('timer');
      if (!timerEl) return;
      const key = 'liva_announcement_end';
      let endTime;
      try {
        endTime = parseInt(localStorage.getItem(key), 10);
        if (!endTime || isNaN(endTime) || endTime <= Date.now()) {
          endTime = Date.now() + (24 * 60 * 60 * 1000);
          localStorage.setItem(key, endTime);
        }
      } catch (_) {
        endTime = Date.now() + (24 * 60 * 60 * 1000);
      }

      function update() {
        const remaining = Math.max(0, endTime - Date.now());
        const hours = Math.floor(remaining / 3600000);
        const minutes = Math.floor((remaining % 3600000) / 60000);
        const seconds = Math.floor((remaining % 60000) / 1000);
        timerEl.textContent =
          String(hours).padStart(2, '0') + ':' +
          String(minutes).padStart(2, '0') + ':' +
          String(seconds).padStart(2, '0');
      }
      update();
      setInterval(update, 1000);
    }
    initAnnouncementTimer();
  });
})(window, window.jQuery);
