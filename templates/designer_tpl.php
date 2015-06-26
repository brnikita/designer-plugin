<div id="main-container" class="main-container clearfix">
    <div id="designer-init-preloader" data-bind="visible: !$root.status().completed">
        <h5 data-bind="text: $root.status().message" class="text-center text-info"></h5>
        <div class="progress">
            <div class="progress-bar progress-bar-striped active" role="progressbar" data-bind="style: { width: $root.percentCompleted() }"></div>
        </div>
    </div>
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
                            <span>Colour</span>
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
                        <a href="#" data-bind="text: name, click: $root.selectColorElement,
                                            style: {color: name() == $root.currentColorizeElementGroup() ? '#D51622': '#3F3F3F'}
                                            "></a>
                    </li>
                </ul>
                <ul class="colors-classes clearfix" data-bind="foreach: colorClasses">
                    <li data-bind="
                        style: {
                            'border-color': value() == '#FFFFFF' ? '#A3A2A4': value(),
                            'background-color': $root.selectedProductElementColor().name() == name() ? value(): '#FFFFFF'
                            }
                        "><a href="#"
                           data-bind="style: {color: $root.selectedProductElementColor().name() == name() ? value()== '#FFFFFF' ? '#000000': '#FFFFFF': value()== '#FFFFFF' ? '#A3A2A4': value() },
                                                        text: name, click: $root.selectColorSubElement"></a>
                    </li>
                </ul>
                <!--<div>COLOR SELECTED <span data-bind="text: $root.selectedProductElementColor().colors[selectedProductElementColor().id()].name()"></span></div>-->
                <ul class="colors-palette clearfix" data-bind="foreach: colorsList">
                    <li>
                        <a href="#" data-bind="
                            style: {
                                'background-color': value,
                                'color': value,
                                'border-color': value == '#FFFFFF' ? '#A3A2A4': value
                                },
                            title: name,
                            click: $root.colorSelected,
                            css: {
                                selected: $data.value.toLocaleLowerCase() === $root.selectedProductElementColor().value().toLocaleLowerCase()
                            }
                        ">
                        <svg data-bind="visible: $data.value.toLocaleLowerCase() === $root.selectedProductElementColor().value().toLocaleLowerCase(), style: {fill: value == '#FFFFFF' ? '#A3A2A4': value}"
                             id="color-select-arrow" xmlns="http://www.w3.org/2000/svg" xml:space="preserve" width="24px" height="24px" version="1.1" style="shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd" viewBox="0 0 24 24" xmlns:xlink="http://www.w3.org/1999/xlink">
                              <g>
                                <g>
                                    <path class="fil1" d="M6 12c0,0 0,0 0,0 0,0 0,0 1,0l3 3 7 -7c1,0 1,0 1,0 0,0 0,0 0,0l-8 8 0 0 0 0 -4 -4z"/>
                                </g>
                             </g>
                        </svg>
                        </a>
                    </li>
                </ul>

            </div>
            <div id="graphics-tab" class="hide">
                <div id="graphics-add-form">
                    <div class="graphics-controls">
                        <div class="graphics-select">
                            <select data-bind="
                                options: graphicRootCategory().categories,
                                optionsText: 'name',
                                value: graphicCategory,
                                optionsCaption: 'All Graphics',
                                event: {change: enterGraphicCategory}
                            "></select>
                            <span></span>
                        </div>
                        <div class="graphics-search">
                            <input type="text" placeholder="Search"
                                   data-bind="value: graphicsSearchQuery, valueUpdate: 'input'">
                            <!--<button class="close" aria-hidden="true"
                                    data-bind="visible: graphicsSearchQuery().length > 0, click: clearGraphicsSearch">&times;</button>-->
                            <span></span>
                        </div>
                        <div class="graphics-upload">
                            <a class="js-graphics-upload-form" type="button"><span></span></a>
                        </div>

                    </div>


                    <div class="graphics-list">
                        <div class="graphics-back-btn" data-bind="visible: graphicSelectedSubcategory, click: backGraphicItem">
                            Back
                        </div>
                        <ul data-bind="foreach: currentGraphics , css: { narrow: graphicSelectedSubcategory }">
                            <li data-bind="
                                    click: $root.selectGraphicItem,
                                    css: { category: isCategory(),
                                    image: isImage() },
                                    style: { backgroundImage: 'url(' + categoryThumb() + ')' }">
                                <a data-bind="visible: isImage()">
                                    <img src="#" data-bind="attr: { src: thumb }" alt="" />
                                    <span data-bind="text: name"></span>
                                </a>
                                <a data-bind="visible: isCategory()">
                                    <img src="#" data-bind="attr: { src: thumb }" alt="" />
                                    <span data-bind="text: name"></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div id="graphics-upload-form" class="hide">
                    <div class="graphics-upload-form__title">
                        <span>Uploading Photos and Images</span>
                        <a class="js-graphics-color-form">
                            <span></span>
                        </a>
                    </div>

                    <p>Please note that in order to use a design (photo, image, text, brand or saying) you must have full rights to use this design.</p>
                    <p>By uploading or saving a design you agree that:</p>
                    <ol>
                        <li>You hold the rights to commercially reproduce this design.</li>
                        <li>You also release us from any claims made as a result of any copyright infringement.</li>
                        <li>You understand that infringement of copyright is illegal. If you have any doubt as to the legal ownership of a design you should check with the rightful owner that you are able to use the design before uploading.</li>
                        <li>You understand that we act under your instructions and is not obligated in any way to check or confirm the legal use of reproducing any designs.</li>
                    </ol>
                    <p class="graphics-upload-form__info">Graphics Information</p>
                    <p>Designer supports jpeg, gif, png and svg formats. All images need to have a minimum resolution of 150 dpi.</p>
                    <input type="checkbox" name="upload terms" value="">
                    <p>I understand and accept these conditions of copyright.</p>
                    <div class="graphics-upload-form__upload">
                        <a href="#">Upload</a>
                    </div>
                    <!--<div class="designer-dropdown-form-header">
                        <span class="designer-form-header-title">Upload Graphics</span>
                        <a class="designer-close-window-btn"></a>
                        <button type="button" class="close js-graphics-upload-form">&times;</button>
                    </div>
                    <div id="upload-image-form-content">
                        <form id="designer-upload-upload-image-by-url">
                            <div class="input-group">
                                <input id="designer-upload-graphics-url-input" type="text" class="form-control" placeholder="Url" data-bind="value: customImageUrl, valueUpdate: 'input'">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="button" data-bind="click: showUploadConditions.bind($data, 'url'), enable: customImageUrl().length > 0">Add</button>
                                    </span>
                            </div>
                        </form>
                        <h6 class="text-center" data-bind="visible: uploadFileAvailable">or</h6>
                        <form id="designer-upload-image-form" enctype="multipart/form-data" method="post" data-bind="visible: uploadFileAvailable">
                            <button id="designer-upload-image-browse-btn" type="button" class="btn btn-default btn-block" data-loading-text="Uploading..." data-bind="click: showUploadConditions.bind($data, 'upload')">Browse for file...</button>
                        </form>
                        <button class="btn btn-default js-graphics-upload-form" id="done-numbers-btn" type="button">Done</button>
                    </div>-->
                </div>

                <div id="graphics-color-form" class="hide">
                    <div class="graphics-color-form__title">
                        <span>Change the colors of you graphic</span>
                        <a class="js-graphics-color-form">
                            <span></span>
                        </a>
                    </div>
                    <div class="graphics-color-form__palette" data-bind="visible: selectedIsGraphics">
                        <ul class="colors-classes clearfix"
                            data-bind="foreach: { data: selectedGraphicsFormatVO().complexColor().colorizeList}">
                            <!--<li>
                                <a href="#" class="" data-bind="style: {'background-color': value}, text: name, click: $root.selectColorSubElement"></a> |
                            </li>-->
                            <li data-bind="
                                style: {
                                    'border-color': value() == '#FFFFFF' ? '#A3A2A4': value(),
                                    'background-color': $root.selectedProductElementColor().name() == name() ? value(): '#FFFFFF'
                                    }
                                "><a href="#"
                                     data-bind="style: {color: $root.selectedProductElementColor().name() == name() ? value()== '#FFFFFF' ? '#000000': '#FFFFFF': value()== '#FFFFFF' ? '#A3A2A4': value() },
                                                                text: name, click: $root.selectColorSubElement"></a>
                            </li>
                        </ul>
                        <ul class="colors-palette clearfix" data-bind="foreach: colorsList">
                            <li>
                                <a href="#" data-bind="
                                    style: {
                                        'background-color': value,
                                        'color': value,
                                        'border-color': value == '#FFFFFF' ? '#A3A2A4': value
                                        },
                                    title: name,
                                    click: $root.colorSelected,
                                    css: {
                                        selected: $data.value.toLocaleLowerCase() === $root.selectedProductElementColor().value().toLocaleLowerCase()
                                    }
                                "><svg data-bind="visible: $data.value.toLocaleLowerCase() === $root.selectedProductElementColor().value().toLocaleLowerCase(), style: {fill: value == '#FFFFFF' ? '#A3A2A4': value}"
                                     id="color-select-arrow" xmlns="http://www.w3.org/2000/svg" xml:space="preserve" width="24px" height="24px" version="1.1" style="shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd" viewBox="0 0 24 24" xmlns:xlink="http://www.w3.org/1999/xlink">
                                      <g>
                                        <g>
                                            <path class="fil1" d="M6 12c0,0 0,0 0,0 0,0 0,0 1,0l3 3 7 -7c1,0 1,0 1,0 0,0 0,0 0,0l-8 8 0 0 0 0 -4 -4z"/>
                                        </g>
                                     </g>
                                </svg>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="left-column lc-products-tab">
            <div id="canvas-container">
                <!-- DesignerJS core goes here -->
            </div>
            <!-- Product side switch -->
            <div id="product-sides-switch"
                 data-bind="visible: selectedProductVO().locations().length > 1">
                <ul class="" data-bind="foreach: selectedProductVO().locations">
                    <li data-bind="css: { active: $data.name == $root.selectedProductLocation() }">
                        <a data-bind="click: $root.selectProductLocation">
                            O
                            <!--<span data-bind="text: $data.name"></span>-->
                        </a>
                    </li>
                </ul>
            </div>
            <div class="clearfix">

            </div>
            <!-- Product side switch end -->
            <div id="bottom-menus" class="bottom-menus">
                <div id="bottom-menu" data-bind="css: {hide: isBottomColorPaletteShowed()}">
                    <div class="bottom-menu__main">
                        <a class="js-ellipsis-menu"><span>...</span></a>
                        <a class="js-designer-tab" href="share-design-tab" onclick="onShareDesign()">
                            <span>SAVE/SHARE</span>
                        </a>
                        <a class="js-designer-tab" href="product-sizes-tab">
                            <span>ADD SIZES & QTY</span>
                        </a>
                    </div>
                    <div class="bottom-menu__ellipsis hide">
                        <a class="js-ellipsis-menu"><span>...</span></a>
                        <a id="undo-btn" class=""
                           data-bind="click: undo, visible: isUndoActive"><span>Undo</span></a>
                        <a id="redo-btn" class=""
                           data-bind="click: redo, visible: isRedoActive"><span>Redo</span></a>
                        <a id="copy-btn" class="" data-bind="click: copy">Copy</a>
                        <a id="paste-btn" class="" data-bind="click: paste">Paste</a>
<!--
                        <ul class="nav nav-pills designer-button-bar">
                            <li id="undo"><a id="undo-btn" data-bind="click: undo, visible: isUndoActive"><span>Undo</span></a></li>
                            <li id="redo"><a id="redo-btn" data-bind="click: redo, visible: isRedoActive"><span>Redo</span></a></li>
                            <li id="copy"><a id="copy-btn" data-bind="click: copy">Copy</a></li>
                            <li id="paste"><a id="paste-btn" data-bind="click: paste">Paste</a></li>
                        </ul>
-->
                    </div>
                    <div>

                    </div>
                </div>
                <div class="clearfix">

                </div>
                <div id="colors-palette-carousel" class="bottom-color-palette carousel hide" data-interval=false
                     data-bind="css: {hide: !isBottomColorPaletteShowed()}">

                    <a class="carousel-left carousel-control" href="#colors-palette-carousel" role="button" data-slide="prev">
                        <svg class="color-palette-arrows" xmlns="http://www.w3.org/2000/svg" xml:space="preserve" width="12px" height="24px" version="1.1" style="shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd"
                            viewBox="0 0 12 24"
                             xmlns:xlink="http://www.w3.org/1999/xlink">
                             <g>
                                 <path class="fil0" d="M9 4c1,0 1,0 1,0 0,0 0,1 0,1l-7 7 7 7c0,0 0,1 0,1 0,0 0,0 -1,0l-7 -8 0 0 0 0 7 -8z"/>
                                 <rect class="fil1" width="12" height="24"/>
                             </g>
                            </svg>
                        <!--<span class="sr-only">Previous</span>-->
                    </a>

                    <ul class="carousel-inner" data-bind="foreach: { data: colorsGroupsList, as: 'group' }">
                        <li class="item" data-bind="css: {active: $index() === 0}">
                            <ul class="colors-palette-group" data-bind="foreach: { data: items, as: 'item' }">
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
                                ">
                                <svg data-bind="visible: $data.value.toLocaleLowerCase() === $root.selectedProductElementColor().value().toLocaleLowerCase(), style: {fill: value == '#FFFFFF' ? '#A3A2A4': value}"
                                     id="color-select-arrow" xmlns="http://www.w3.org/2000/svg" xml:space="preserve" width="24px" height="24px" version="1.1" style="shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd" viewBox="0 0 24 24" xmlns:xlink="http://www.w3.org/1999/xlink">
                                      <g>
                                        <g>
                                            <path class="fil1" d="M6 12c0,0 0,0 0,0 0,0 0,0 1,0l3 3 7 -7c1,0 1,0 1,0 0,0 0,0 0,0l-8 8 0 0 0 0 -4 -4z"/>
                                        </g>
                                     </g>
                                </svg>
                                </a>
                                </li>
                            </ul>
                        </li>
                    </ul>

                    <a class="carousel-right carousel-control" href="#colors-palette-carousel" role="button" data-slide="next">
                        <svg class="color-palette-arrows" xmlns="http://www.w3.org/2000/svg" xml:space="preserve" width="12px" height="24px" version="1.1" style="shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd"
                            viewBox="0 0 12 24"
                             xmlns:xlink="http://www.w3.org/1999/xlink">
                             <g>
                                 <path class="fil0" d="M3 4c-1,0 -1,0 -1,0 0,0 0,1 0,1l7 7 -7 7c0,0 0,1 0,1 0,0 0,0 1,0l7 -8 0 0 0 0 -7 -8z"/>
                                 <rect class="fil1" width="12" height="24"/>
                             </g>
                            </svg>
                        <!--<span class="sr-only">Next</span>-->
                    </a>

                </div>
            </div>

        </div>
    </div>
</div>

