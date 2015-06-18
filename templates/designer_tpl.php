<div id="main-container" class="main-container clearfix">
    <div id="main-subcontainer" class="main-subcontainer clearfix">
        <div class="right-column">
            <div class="main-nav">
                <ul>
                    <li class="main-nav__tab main-nav__tab_name_products active">
                        <a class="js-designer-tab active" href="products-tab">
                            <span>Products</span>
                        </a>
                    </li>
                    <li class="main-nav__tab main-nav__tab_name_colors">
                        <a class="js-designer-tab" href="colors-tab">
                            <span>Color</span>
                        </a>
                    </li>
                    <li class="main-nav__tab main-nav__tab_name_text">
                        <a class="js-designer-tab" href="text-tab">
                            <span>Text</span>
                        </a>
                    </li>
                    <li class="main-nav__tab main-nav__tab_name_graphics">
                        <a class="js-designer-tab" href="graphics-tab">
                            <span>Graphics</span>
                        </a>
                    </li>
                    <li class="main-nav__tab main-nav__tab_name_numbers">
                        <a class="js-designer-tab" href="numbers-tab">
                            <span>Numbers</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div id="products-tab" class="products-tab">
                <div class="products-controls">
                    <div class="products-select">
                        <select class="" data-bind="
                                options: productRootCategory().categories,
                                optionsText: 'name',
                                optionsValue: 'id',
                                value: selectedCategoryId,
                                event: {change: changeCategorySelectHandler},
                                optionsCaption: 'Choose...'
                            "></select>
                        <span></span>
                    </div>
                    <div class="products-search">
                        <input type="text" placeholder="Search..."
                               data-bind="value: productsSearchQuery, valueUpdate: 'input'">
                        <span></span>
                    </div>
                </div>
                <div class="products-list">
                    <div class="products-back-btn" data-bind="click: backToCategoriesList, visible: backToCategoriesVisible">
                        Back
                    </div>
                    <ul class="" data-bind="foreach: currentProducts">
                        <li data-bind="
                                       click: $root.selectProductItem,
                                       css: { category: isCategory(),
                                       product: isProduct(),
                                       active: $data.id() == $root.selectedProductVO().id()
                                        }
                                ">
                            <a
                               data-bind="css: {active: $data.id() == $root.selectedProductVO().id()}, visible: isProduct()">
                                <img src="" data-bind="attr: { src: thumbUrl, title: name }" alt="">
                                <span data-bind="text: name"></span>
                            </a>
                            <a data-bind="visible: isCategory()">
                                <img src="" data-bind="attr: { src: thumbUrl }" alt="">
                                <span data-bind="text: name"></span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div id="colors-tab" class="colors-tab hide">
                <ul class="colorizable-groups clearfix"
                    data-bind="foreach: { data: selectedProductColorVO().colorizeGroupList}">
                    <li>
                        <a href="#" data-bind="text: name, click: $root.selectColorElement"></a>
                    </li>
                </ul>
                <ul class="colors-classes clearfix" data-bind="foreach: colorClasses">
                    <li data-bind="style: {backgroundColor: value, borderColor: value }">
                        <a href="#"
                           data-bind="text: name, click: $root.selectColorSubElement"></a>
                    </li>
                </ul>
                <!--            <div>color selected <span data-bind="text: selectedProductElementColor().name"></span></div>-->
                <ul class="colors-palette clearfix" data-bind="foreach: colorsList">
                    <li>
                        <a href="#" data-bind="
                            style: {
                                'background-color': value,
                                'color': value,
                                'border-color': value
                                },
                            title: name,
                            click: $root.colorSelected,
                            css: {
                                selected: $data.value.toLocaleLowerCase() === $root.selectedProductElementColor().value().toLocaleLowerCase()
                            }
                        "></a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="left-column lc-products-tab">
            <div id="canvas-container">
                <!-- DesignerJS core goes here -->
            </div>

            <div id="bottom-menus" class="bottom-menus">
                <div id="bottom-menu">
                    <div id="bottom-menu-main" class="">
                        <a class="js-ellipsis-menu"><span>...</span></a>
                        <a class="js-designer-tab" href="share-design-tab" onclick="onShareDesign()">
                            <span>SAVE/SHARE</span>
                        </a>
                        <a class="js-designer-tab" href="product-sizes-tab">
                            <span>ADD SIZES & QTY</span>
                        </a>
                    </div>
                    <div id="bottom-menu-ellipsis" class="hide">
                        <a class="js-ellipsis-menu"><span>...</span></a>
                        <a id="undo-btn" class=""
                           data-bind="click: undo, visible: isUndoActive"><span>Undo</span></a>
                        <a id="redo-btn" class=""
                           data-bind="click: redo, visible: isRedoActive"><span>Redo</span></a>
                        <a id="copy-btn" class="" data-bind="click: copy">Copy</a>
                        <a id="paste-btn" class="" data-bind="click: paste">Paste</a>
                        <!--                    <ul class="nav nav-pills designer-button-bar">
                                                <li id="undo"><a id="undo-btn" data-bind="click: undo, visible: isUndoActive"><span>Undo</span></a></li>
                                                <li id="redo"><a id="redo-btn" data-bind="click: redo, visible: isRedoActive"><span>Redo</span></a></li>
                                                <li id="copy"><a id="copy-btn" data-bind="click: copy">Copy</a></li>
                                                <li id="paste"><a id="paste-btn" data-bind="click: paste">Paste</a></li>
                                            </ul>-->
                    </div>
                    <div>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

