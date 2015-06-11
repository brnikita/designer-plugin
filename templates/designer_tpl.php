<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6">
            <div id="canvas-container">
                <!-- DesignerJS core goes here -->
            </div>
            <!-- Product side switch -->
            <div id="product-sides-switch-container" class="designer-panel-container"
                 data-bind="visible: selectedProductVO().locations().length > 1">
                <div class="centered-pills-container">
                    <ul class="nav nav-pills" data-bind="foreach: selectedProductVO().locations">
                        <li data-bind="css: { active: $data.name == $root.selectedProductLocation() }">
                            <a data-bind="click: $root.selectProductLocation">
                                O
                                <!--                                <span data-bind="text: $data.name"></span>-->
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- Product side switch end -->
            <div id="bottom-menu">
                <div id="bottom-menu-main" class="">
                    <a class="btn btn-default js-ellipsis-menu"><span>...</span></a>
                    <a class="btn btn-default js-designer-tab" href="share-design-tab" onclick="onShareDesign()">
                        <span>SAVE/SHARE</span>
                    </a>
                    <a class="btn btn-default js-designer-tab" href="product-sizes-tab">
                        <span>ADD SIZES & QTY</span>
                    </a>
                </div>
                <div id="bottom-menu-ellipsis" class="hide">
                    <a class="btn btn-default js-ellipsis-menu"><span>...</span></a>
                    <a id="undo-btn" class="btn btn-default"
                       data-bind="click: undo, visible: isUndoActive"><span>Undo</span></a>
                    <a id="redo-btn" class="btn btn-default"
                       data-bind="click: redo, visible: isRedoActive"><span>Redo</span></a>
                    <a id="copy-btn" class="btn btn-default" data-bind="click: copy">Copy</a>
                    <a id="paste-btn" class="btn btn-default" data-bind="click: paste">Paste</a>
                    <!--                    <ul class="nav nav-pills designer-button-bar">
                                            <li id="undo"><a id="undo-btn" data-bind="click: undo, visible: isUndoActive"><span>Undo</span></a></li>
                                            <li id="redo"><a id="redo-btn" data-bind="click: redo, visible: isRedoActive"><span>Redo</span></a></li>
                                            <li id="copy"><a id="copy-btn" data-bind="click: copy">Copy</a></li>
                                            <li id="paste"><a id="paste-btn" data-bind="click: paste">Paste</a></li>
                                        </ul>-->
                </div>
            </div>

        </div>
        <div class="col-lg-5 col-lg-offset-1">
            <div class="designer_main-menu">
                <a class="btn btn-default js-designer-tab active" href="products-tab">
                    <span>Products</span>
                </a>
                <a class="btn btn-default js-designer-tab" href="colors-tab">
                    <span>Color</span>
                </a>
                <a class="btn btn-default js-designer-tab" href="text-tab">
                    <span>Text</span>
                </a>
                <a class="btn btn-default js-designer-tab" href="graphics-tab">
                    <span>Graphics</span>
                </a>
                <a class="btn btn-default js-designer-tab" href="numbers-tab">
                    <span>Numbers</span>
                </a>
            </div>
        </div>
        <div id="products-tab" class="col-lg-5 col-lg-offset-1">
            <div class="row">
                <div class="col-lg-6">

                    <!--<div class="btn-group">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            <span class="glyphicon glyphicon-menu-down"></span>
                            Action <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" role="menu" data-bind="
                            options: productRootCategory().categories,
                            optionsText: 'name',
                            optionsValue: 'id',
                            value: selectedCategoryId,
                            event: {change: changeCategorySelectHandler},
                            optionsCaption: 'Choose...'
                        ">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                        </ul>
                    </div>-->

                    <select class="form-control" data-bind="
                        options: productRootCategory().categories,
                        optionsText: 'name',
                        optionsValue: 'id',
                        value: selectedCategoryId,
                        event: {change: changeCategorySelectHandler},
                       optionsCaption: 'Choose...'
                    "><span class="glyphicon glyphicon-menu-down"></span></select>
                </div>
                <div class="col-lg-6">
                    <div id="products-search" class="search-box">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search"
                                   data-bind="value: productsSearchQuery, valueUpdate: 'input'">

                            <div class="input-group-addon"><span class="glyphicon glyphicon-search"></span></div>
                            <button class="close" aria-hidden="true"
                                    data-bind="visible: productsSearchQuery().length > 0, click: clearProductsSearch">&times;</button>
                        </div>
                    </div>
                </div>
            </div>
            <a class="designer-back-btn"
               data-bind="click: backToCategoriesList, visible: backToCategoriesVisible"><</a>
            <ul data-bind="foreach: currentProducts">
                <li data-bind="
                               click: $root.selectProductItem,
                               css: { category: isCategory(),
                               product: isProduct(),
                               active: $data.id() == $root.selectedProductVO().id()
                                }
                        ">
                    <a class="designer-product"
                       data-bind="css: {active: $data.id() == $root.selectedProductVO().id()}, visible: isProduct()">
                        <span data-bind="text: name"></span>
                        <img src="" data-bind="attr: { src: thumbUrl, title: name }" alt="">
                    </a>
                    <a class="designer-category" data-bind="visible: isCategory()" class="category">
                        <span data-bind="text: name"></span>
                        <img src="" data-bind="attr: { src: thumbUrl }" alt="">
                    </a>
                </li>
            </ul>
        </div>
        <div id="colors-tab" class="col-lg-5 col-lg-offset-1 hide">
            <ul class="clearfix designer-color-elements"
                data-bind="foreach: { data: selectedProductColorVO().colorizeGroupList}">
                <li>
                    <a href="#" data-bind="text: name, click: $root.selectColorElement"></a> |
                </li>
            </ul>
            <ul class="clearfix designer-color-classes" data-bind="foreach: colorClasses">
                <li>
                    <a class="btn btn-default" href="#"
                       data-bind="style: {'background-color': value}, text: name, click: $root.selectColorSubElement"></a>
                </li>
            </ul>
            <!--            <div>color selected <span data-bind="text: selectedProductElementColor().name"></span></div>-->
            <ul class="designer-color-palette clearfix" data-bind="foreach: colorsList">
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
        <div id="text-tab" class="col-lg-5 col-lg-offset-1 hide">
            <div class="row">
                <div class="col-lg-6">
                    Add/Edit Text
                </div>
                <div class="col-lg-6">
                    <button class="btn btn-default" id="add-text-btn" type="button"
                            data-bind="click: addText, enable: selectedLetteringVO().text().length > 0, visible: !strictTemplate()">
                        +
                    </button>
                </div>
            </div>
            <div class="row">
                <textarea id="add-text-input"
                          data-bind="value: selectedLetteringVO().text, valueUpdate: 'input', enable: editTextEnabled(), visible: !strictTemplate(), style: { textAlign: selectedLetteringVO().formatVO().textAlign }"
                          type="text" placeholder="Type here..."></textarea>
            </div>

            <div class="row" data-bind="visible: textToolsIsVisible">
                <div class="col-lg-4">
                    SELECT FONT
                </div>
                <div class="col-lg-2">
                    <button class="btn btn-default" type="button" data-bind="click: toggleFontsList">T</button>
                </div>
                <div class="col-lg-5">
                    CHOOSE A COLOR
                </div>
                <div class="col-lg-1">
                    <a class="choose-color" href="#" data-bind="style: {
                                'background-color': selectedLetteringVO().formatVO().fillColor,
                                'color': selectedLetteringVO().formatVO().fillColor,
                                'border-color': selectedLetteringVO().formatVO().fillColor
                                },
                                 click: toggleFontsColorsList"></a>
                </div>
            </div>
            <div class="row fonts-colors" data-bind="visible: showFontsColorsList">
                <a href="#" class="btn btn-default fonts-colors__close" data-bind="click: toggleFontsColorsList">X</a>
                <ul class="designer-color-palette clearfix" data-bind="foreach: colors">
                    <li>
                        <a href="#" data-bind="
                        style: {
                            'background-color': value,
                            'color': value,
                            'border-color': value
                            },
                        title: name,
                        click: $root.selectFontColor,
                        css: {
                            selected: $data.value.toLocaleLowerCase() === $root.selectedLetteringVO().formatVO().fillColor().toLocaleLowerCase()
                        }
                    "></a>
                    </li>
                </ul>
            </div>
            <div class="row font-list" data-bind="visible: showFontsList">
                <a href="#" class="btn btn-default font-list__close" data-bind="click: toggleFontsList">X</a>
                <ul data-bind="foreach: fonts">
                    <li class="font-list__item"
                        data-bind="css: { active: $root.selectedLetteringVO().formatVO().fontFamily() === $data.fontFamily }">
                        <a href="#"
                           data-bind="text: $data.name, click: $root.selectFont, style: { fontFamily: $data.fontFamily }"></a>
                    </li>
                </ul>
            </div>
            <div class="row" data-bind="visible: textToolsIsVisible">
                <div class="col-lg-2">ALIGN TEXT</div>
                <div class="col-lg-5" data-toggle="buttons"
                     data-bind="radio: selectedLetteringVO().formatVO().textAlign">
                    <label id="text-align-left-btn" class="glyphicon glyphicon-align-left btn btn-default"
                           data-bind="css: { disabled: !textAlignEnabled() }">
                        <input type="radio" name="rb-text-align-group" value="left"
                               data-bind="enable: textAlignEnabled()">
                    </label>
                    <label id="text-align-center-btn" class="glyphicon glyphicon-align-center btn btn-default"
                           data-bind="css: { disabled: !textAlignEnabled() }">
                        <input type="radio" name="rb-text-align-group" value="center"
                               data-bind="enable: textAlignEnabled()">
                    </label>
                    <label id="text-align-right-btn" class="glyphicon glyphicon-align-right btn btn-default"
                           data-bind="css: { disabled: !textAlignEnabled() }">
                        <input type="radio" name="rb-text-align-group" value="right"
                               data-bind="enable: textAlignEnabled()">
                    </label>
                </div>
                <div class="col-lg-4">
                    ADD AN OUTLINE
                </div>
                <div class="col-lg-1">
                    <a class="choose-color" href="#" data-bind="style: {
                                'background-color': selectedLetteringVO().formatVO().strokeColor,
                                'color': selectedLetteringVO().formatVO().strokeColor,
                                'border-color': selectedLetteringVO().formatVO().strokeColor
                                },
                                 click: toggleFontsStrokeColorsList"></a>
                </div>
            </div>
            <div class="row fonts-colors" data-bind="visible: showFontsStrokeColorsList">
                <a href="#" class="btn btn-default fonts-colors__close"
                   data-bind="click: toggleFontsStrokeColorsList">X</a>
                <ul class="designer-color-palette clearfix" data-bind="foreach: strokeColors">
                    <li>
                        <a href="#" data-bind="
                        style: {
                            'background-color': value,
                            'color': value,
                            'border-color': value
                            },
                        title: name,
                        click: $root.selectFontStrokeColor,
                        css: {
                            selected: $data.value.toLocaleLowerCase() === $root.selectedLetteringVO().formatVO().strokeColor().toLocaleLowerCase()
                        }
                    "></a>
                    </li>
                </ul>
            </div>
            <div class="row" data-bind="visible: textToolsIsVisible">
                <div class="col-lg-3">RESIZE TEXT</div>
                <div class="col-lg-9">
                    <div class="noUiSlider"
                         data-bind="slider: selectedLetteringVO().formatVO().fontSize, rangeStart: 10, rangeEnd: 200, step: 1, visible: showLetterSpacingSlider()"></div>
                </div>
            </div>

            <div class="row" data-bind="visible: textToolsIsVisible">
                <div class="col-lg-3">ROTATE TEXT</div>
                <div class="col-lg-9">
                    <div class="noUiSlider"
                         data-bind="slider: selectedLetteringVO().formatVO().rotation, rangeStart: 0, rangeEnd: 360, step: 1, visible: showLetterSpacingSlider()"></div>
                </div>
            </div>

            <div class="row" data-bind="visible: textToolsIsVisible">
                <div class="col-lg-3">LETTER SPACE</div>
                <div class="col-lg-9">
                    <div class="noUiSlider"
                         data-bind="slider: selectedLetteringVO().formatVO().letterSpacing, rangeStart: 0, rangeEnd: 20, step: 1, visible: showLetterSpacingSlider()"></div>
                </div>
            </div>

            <div class="row" data-bind="visible: showLineLeadingSlider()">
                <div class="col-lg-3">LINE HEIGHT</div>
                <div class="col-lg-9">
                    <div id="text-line-leading-slider" class="noUiSlider"
                         data-bind="slider: selectedLetteringVO().formatVO().lineLeading, rangeStart: 0, rangeEnd: 3, step: 0.05, decimals: 2"></div>
                </div>
            </div>

            <!--            <div data-bind="visible: showTextEffects()" class="btn-group">-->
            <!--                <button class="btn btn-default" type="button" id="text-effects-btn"-->
            <!--                        data-bind="text: selectedTextEffectVO().label()" data-toggle="dropdown"><span-->
            <!--                        class="caret"></span></button>-->
            <!--                <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">-->
            <!--                    <span class="caret"></span>-->
            <!--                </button>-->
            <!--                <ul class="dropdown-menu" data-bind="foreach: textEffects"-->
            <!--                    style="height: 150px; overflow-y: scroll;">-->
            <!--                    <li data-bind="css: { active: $root.selectedTextEffectVO().name() === $data.name }">-->
            <!--                        <a data-bind="text: $data.label, click: $root.selectTextEffect"></a>-->
            <!--                    </li>-->
            <!--                </ul>-->
            <!--            </div>-->

            <h6 data-bind="visible: showEffectsSlider(), text: selectedTextEffectVO().paramName()"></h6>

            <div id="text-effect-slider" class="noUiSlider"
                 data-bind="visible: showEffectsSlider(), slider: selectedTextEffectVO().value, rangeStart: selectedTextEffectVO().min(), rangeEnd: selectedTextEffectVO().max(), step: selectedTextEffectVO().step(), decimals:2"></div>
            <div class="divider" data-bind="visible: selectedProductSizeVO().notEmpty"></div>
            <div id="text-form-size" data-bind="visible: selectedProductSizeVO().notEmpty">
                <div>
                    <h6 id="text-form-size-label">Size</h6>
                    <input id="text-width" class="form-control" type="text"
                           data-bind="value: selectedObjectPropertiesVO().width, event: { keypress: selectedObjectPropertiesVO().updateWidth }"/>
                    <span id="text-form-size-label-seperator">&times;</span>
                    <input id="text-height" class="form-control" type="text"
                           data-bind="value: selectedObjectPropertiesVO().height, event: { keypress: selectedObjectPropertiesVO().updateHeight }"/>
                </div>
                <div>
                    <button class="btn btn-default" id="text-form-size-apply-btn" type="button">Apply</button>
                </div>
            </div>
        </div>

        <div id="numbers-tab" class="col-lg-5 col-lg-offset-1 hide">
            <div>
                <button class="btn btn-default" id="add-names-btn" type="button" data-bind="click: addNameObj">Add
                    name
                </button>
                <button class="btn btn-default" id="add-numbers-btn" type="button" data-bind="click: addNumberObj">Add
                    number
                </button>
                <button class="btn btn-default" id="add-numbers-btn" type="button">Order Sheet</button>
            </div>

            <div id="order-sheet-container">
                <div id="names-number-table-container">
                    <table class="" id="names-number-table">
                        <thead data-bind="visible: namesNumbers().length > 0">
                        <tr>
                            <th></th>
                            <th>Names</th>
                            <th>Numbers</th>
                            <th>Size</th>
                        </tr>
                        </thead>
                        <tbody data-bind="foreach: namesNumbers">
                        <tr>
                            <td data-bind="text: ($index() + 1) + '.'" class="bold">

                            </td>
                            <td>
                                <input type="text" data-bind="value: $data.name"
                                       class="form-control designer-names-input"
                                       placeholder="Name"/>
                            </td>
                            <td>
                                <input type="text" data-bind="value: $data.number"
                                       class="form-control designer-numbers-input" placeholder="00"/>
                            </td>
                            <td id="dropmenu-cell">
                                <div class="btn-group designer-names-numbers-size"
                                     data-bind="visible: $root.selectedProductVO().sizes().length > 1">
                                    <button class="btn btn-default" type="button" data-bind="text: $data.size"></button>
                                    <button class="btn btn-default dropdown-toggle" type="button"
                                            id="names-size-dropdown-btn" data-toggle="dropdown">
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu" id="names-sizes-list"
                                        data-bind="foreach: $root.selectedProductVO().sizes">
                                        <li data-bind="css: { active: $data == $parent.size() }">
                                            <a data-bind="text: $data, click: $parent.size"></a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                            <td>
                                <button type="button" data-bind="click: $parent.removeNameNumber"
                                        class="close">&times;</button>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div style="text-align: left;">
                    <button id="designer-add-more-names-btn" class="btn btn-link" type="button"
                            data-bind="click: addNameNumber">+ Add more names and/or numbers
                    </button>
                </div>

                <div>
                    <button class="btn btn-default" id="done-numbers-btn" type="button">Done</button>
                </div>

                <div>
                    NOTE: If you require only a name or only a number, simply
                    leave the field that is not required blank.
                </div>
            </div>
        </div>

        <div id="graphics-tab" class="col-lg-5 col-lg-offset-1 hide">
            <div id="graphics-forms-group">

                <div id="graphics-add-form">
                    <div class="col-lg-5">
                        <select class="form-control" data-bind="
                            options: graphicRootCategory().categories,
                            optionsText: 'name',
                            value: graphicCategory,
                            optionsCaption: 'All Graphics',
                            event: {change: enterGraphicCategory}
                        "></select>
                    </div>
                    <div class="col-lg-5">
                        <div id="graphics-search" class="search-box">
                            <div class="input-group">
                                <div class="input-group-addon"><span class="glyphicon glyphicon-search"></span></div>
                                <input type="text" class="form-control" placeholder="Поиск"
                                       data-bind="value: graphicsSearchQuery, valueUpdate: 'input'">
                                <button class="close" aria-hidden="true"
                                        data-bind="visible: graphicsSearchQuery().length > 0, click: clearGraphicsSearch">&times;</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <button class="btn btn-default js-graphics-upload-form" id="upload-btn" type="button">Upload</button>
                    </div>
                    <div class="col-lg-12">
                        <a class="designer-back-btn btn2" data-bind="visible: graphicSelectedSubcategory, click: backGraphicItem"><</a>
                        <ul data-bind="foreach: currentGraphics , css: { narrow: graphicSelectedSubcategory }">
                            <li class="thumbnail" data-bind="click: $root.selectGraphicItem,
                                css: { category: isCategory(), image: isImage() },
                                style: { backgroundImage: 'url(' + categoryThumb() + ')' }">
                                <a data-bind="visible: isImage()">
                                    <div class="state"></div>
                                    <span data-bind="text: name"></span>
                                    <img src="#" data-bind="attr: { src: thumb }" alt="" />
                                </a>
                                <a data-bind="text: name, visible: isCategory()"></a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div id="graphics-upload-form" class="hide">
                    <div class="designer-dropdown-form-header">
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
                    </div>
                </div>

                <div id="graphics-color-form" class="hide">
                    <p>Change the colors of you graphic</p>
                    <button type="button" class="close js-graphics-color-form">&times;</button>

                    <ul class="clearfix designer-color-elements"
                        data-bind="foreach: { data: selectedGraphicsFormatVO().complexColor().colorizeList}">
                        <li>
                            <a href="#" data-bind="text: name, click: $root.selectColorElement"></a> |
                        </li>
                    </ul>
                    <ul class="designer-color-palette clearfix" data-bind="foreach: colors">
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
                    <button class="btn btn-default js-graphics-color-form" id="done-numbers-btn" type="button">Done</button>
                </div>

            </div>



        </div>

        <div id="product-sizes-tab" class="col-lg-5 col-lg-offset-1 hide">
            <!--            <div id="product-sizes-panel" class="">-->
            <div id="" class="">
                <p>
                    <span>Sizes & Qty</span>
                    <button type="button" data-bind="" class="close">×</button>
                </p>
                <div>
                    <ul id="product-sizes-list-new" class="list-unstyled" data-bind="foreach: quantities">
                        <li>
                            <!--                            <span class="" data-bind="visible: $root.selectedProductVO().sizes().length < 1">Quantity:</span>-->
                            <!--<select data-bind="visible: $root.selectedProductVO().sizes().length > 1,
                                               options: $root.selectedProductVO().sizes,
                                               value: size">
                            </select>-->

                            <div class="btn-group"
                                 data-bind="visible: $root.selectedProductVO().sizes().length > 1">
                                <button class="btn btn-default" type="button" data-bind="text: $data.size"></button>
                                <button class="btn btn-default dropdown-toggle" type="button"
                                        id="names-size-dropdown-btn" data-toggle="dropdown">
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu" id="names-sizes-list"
                                    data-bind="foreach: $root.selectedProductVO().sizes">
                                    <li data-bind="css: { active: $data == $parent.size() }">
                                        <a data-bind="text: $data, click: $parent.size"></a>
                                    </li>
                                </ul>
                            </div>

                            <span class="btn-group-quantity">
                                    <button class="btn btn-default btn-round" type="button"
                                            data-bind="click: $parent.decreaseQuantity"><span
                                            class="glyphicon glyphicon-minus"></span></button>
                                    <input data-bind="value: quantity, valueUpdate: 'input'" maxlength="3"/>
                                    <button class="btn btn-default btn-round" type="button"
                                            data-bind="click: $parent.increaseQuantity"><span
                                            class="glyphicon glyphicon-plus"></span></button>
                                    <button type="button"
                                            data-bind="click: $parent.removeQuantity, visible: $root.canRemoveSize()"
                                            class="close">&times;</button>
                            </span>

                        </li>
                    </ul>
                    <button class="btn btn-default" type="button"
                            data-bind="click: addQuantity, visible: $root.selectedProductVO().sizes().length > 0">Add
                        Size
                    </button>
                </div>
                <div class="divider"></div>
                <div>
                    <div>Total Order Qty</div>
                    <div data-bind="text: totalQuantity()"></div>
                    <!--                    <div class="order-price" data-bind="if:$root.designInfo().prices!='not available'">-->
                    <div data-bind="foreach: $root.designInfo().prices">
                        <!-- ko if: $data.isTotal -->
                        <!--<div class="gray" data-bind="text: $data.label"></div>-->
                        <div class="">Total inc.gst</div>
                        <div class="order-price" data-bind="text: $data.price, css: { bold: $data.isTotal }"></div>
                        <!-- /ko -->
                    </div>
                    <a id="place-order-btn" class="btn btn-primary btn-block" onclick="onPlaceOrder()"
                       data-loading-text="Placing order...">ADD TO CART</a>
                </div>
            </div>
        </div>

        <div id="share-design-tab" class="col-lg-5 col-lg-offset-1 hide">
            <p>
                <span>Save & Share Your Design</span>
                <button type="button" data-bind="" class="close">×</button>
            </p>
            <p>
                Simply copy the link to access your saved design.
                Or share the link to take full advantage of our designer.
            </p>

            <p>
                - share with friends and family
                - post on social media to gather feedback
                - collaborate with committee members for approval
                - get approval from the boss
                - save for later until sizes are known
            </p>

            <p><textarea row="4" cols="50" data-bind="text: shareLink"></textarea></p>

            <div>
                <button class="btn btn-default" id="done-numbers-btn" type="button">Done</button>
            </div>
        </div>
    </div>
</div>