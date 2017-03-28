window.addEventListener('load', () => {
    let menuDimmer = document.createElement('div');
    let menuContainer = document.createElement('div');
    menuDimmer.classList.add('menu-dimmer');
    menuDimmer.classList.add('hidden-print');
    menuDimmer.append(menuContainer);
    let spanArrowLeft = () => {
        let span = document.createElement('span');
        span.classList.add('glyphicon')
        span.classList.add('glyphicon-chevron-left')
        return span;
    }
    let spanArrowRight = () => {
        let span = document.createElement('span');
        span.classList.add('glyphicon')
        span.classList.add('glyphicon-chevron-right')
        return span;
    }
    menuContainer.classList.add('menu-container')
    let makeMenu = (localRoot, title, parentMenu) => {
        if (!localRoot) return;
        let localContainer = document.createElement('div');
        if (title) {
            let titleElement = document.createElement('a');
            let titleElementText = document.createTextNode(title);
            if (parentMenu) {
                titleElement.append(spanArrowLeft());
                let goBack = event => {
                    event.preventDefault();
                    hideAll();
                    parentMenu.classList.remove('menu-hide')
                }
                titleElement.addEventListener('click', goBack);
            } else {
                titleElement.classList.add('menu-root');
            }
            titleElement.href = "#";
            titleElement.classList.add('menu-title');
            titleElement.append(titleElementText);
            localContainer.append(titleElement);
        }
        let children = localRoot.children
        for (let i = 0; i < children.length; i++) {
            ((child) => {
                let link = child.querySelector('a').cloneNode(true);
                let subMenuSource = children[i].querySelector('ul');
                let subMenuContainer = makeMenu(subMenuSource, link.textContent, localContainer)
                let linkOnClick = (event) => {
                    event.preventDefault();
                    hideAll();
                    subMenuContainer.classList.remove('menu-hide');
                }
                if (subMenuSource) {
                    link.addEventListener('click', linkOnClick);
                    link.append(spanArrowRight());
                    link.classList.add('menu-node');
                }
                localContainer.append(link)
                menuContainer.append(localContainer);
            })(children[i]);
        }
        return localContainer;
    }
    let menuRoot = makeMenu(document.querySelector('.menu-bar'), "Menu");
    let hideAll = () => {
        let children = menuContainer.children;
        for (let i = 0; i < children.length; i++) {
            ((child) => {
                child.classList.add('menu-hide');
            })(children[i]);
        }
    }
    let hideMenu = () => {
        menuDimmer.classList.remove('menu-show');
    }
    let showMenu = () => {
        menuDimmer.classList.add('menu-show');
    }
    hideAll();
    menuRoot.classList.remove('menu-hide');
    document.body.append(menuDimmer);

    document.addEventListener('click', event => {
        if (!menuContainer.contains(event.target) && menuDimmer.classList.contains('menu-show')) {
            hideMenu();
        }
    })

    document.querySelector('.menu-btn').addEventListener('click', function (event) {
        switch (this.dataset.action) {
            case 'menu-show':
                showMenu();
                event.stopPropagation();
                event.preventDefault();
                break;
        }
    });


});
