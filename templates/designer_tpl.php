<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6">
            <div id="canvas-container">
                <!-- DesignerJS core goes here -->
            </div>
            <!-- Product side switch -->
            <div id="product-sides-switch-container" class="designer-panel-container" data-bind="visible: selectedProductVO().locations().length > 1">
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
            <div id="bottom_menu_main">
                <a class="btn btn-default" href="" >
                    <span>...</span>
                </a>
                <a class="btn btn-default" href="">
                    <span>SAVE/SHARE</span>
                </a>
                <a class="btn btn-default" href="">
                    <span>ADD SIZES & QTY</span>
                </a>
            </div>

        </div>
        <div class="col-lg-5 col-lg-offset-1">
            <div class="designer_main-menu">
                <a class="btn btn-default js-designer-tab active" href="products-tab" >
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
                    <select class="form-control" data-bind="
                        options: productRootCategory().categories,
                        optionsText: 'name',
                        optionsValue: 'id',
                        value: selectedCategoryId,
                        event: {change: changeCategorySelectHandler},
                       optionsCaption: 'Choose...'
                    "></select>
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
            <ul class="clearfix designer-color-elements" data-bind="foreach: { data: selectedProductColorVO().colorizeGroupList}">
                <li>
                    <a href="#" data-bind="text: name, click: $root.selectColorElement"></a> |
                </li>
            </ul>
            <ul class="clearfix designer-color-classes" data-bind="foreach: colorClasses">
                <li>
                    <a class="btn btn-default" href="#" data-bind="style: {'background-color': value}, text: name, click: $root.selectColorSubElement"></a>
                </li>
            </ul>
<!--            <div>color selected <span data-bind="text: selectedProductElementColor().name"></span></div>-->
            <ul  class="designer-color-palette clearfix" data-bind="foreach: colorsList">
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

        <div id="numbers-tab" class="col-lg-5 col-lg-offset-1 hide">
            <div>
                <button class="btn btn-default" id="add-names-btn" type="button" data-bind="click: addNameObj">Add name</button>
<!--                <button class="btn btn-default" id="format-names-btn" type="button" data-bind="css: { disabled: !selectedLetteringVO().isNames() }">Format name</button>-->
                <button class="btn btn-default" id="add-numbers-btn" type="button" data-bind="click: addNumberObj">Add number</button>
<!--                <button class="btn btn-default" id="format-numbers-btn" type="button" data-bind="css: { disabled: !selectedLetteringVO().isNumbers() }">Format number</button>-->
                <button class="btn btn-default" id="add-numbers-btn" type="button">Order Sheet</button>
            </div>

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
                            <input type="text" data-bind="value: $data.name" class="form-control designer-names-input" placeholder="Name" />
                        </td>
                        <td>
                            <input type="text" data-bind="value: $data.number" class="form-control designer-numbers-input" placeholder="00" />
                        </td>
                        <td id="dropmenu-cell">
                            <div class="btn-group designer-names-numbers-size" data-bind="visible: $root.selectedProductVO().sizes().length > 1">
                                <button class="btn btn-default" type="button" data-bind="text: $data.size"></button>
                                <button class="btn btn-default dropdown-toggle" type="button" id="names-size-dropdown-btn" data-toggle="dropdown">
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu" id="names-sizes-list" data-bind="foreach: $root.selectedProductVO().sizes">
                                    <li data-bind="css: { active: $data == $parent.size() }">
                                        <a data-bind="text: $data, click: $parent.size"></a>
                                    </li>
                                </ul>
                            </div>
                        </td>
                        <td>
                            <button type="button" data-bind="click: $parent.removeNameNumber" class="close">&times;</button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div style="text-align: left;">
                <button id="designer-add-more-names-btn" class="btn btn-link" type="button" data-bind="click: addNameNumber">+ Add more names and/or numbers</button>
            </div>
        </div>

        <div id="text-tab" class="col-lg-5 col-lg-offset-1 hide">
            <div id="add-text-form">
                <div>
                    <span class="designer-form-header-title">Add/Edit Text</span>
                </div>

                <div>
                    <textarea id="add-text-input" data-bind="value: selectedLetteringVO().text, valueUpdate: 'input', enable: editTextEnabled(), visible: !strictTemplate(), style: { textAlign: selectedLetteringVO().formatVO().textAlign }" type="text" placeholder="Your text here"></textarea>
                    <textarea id="edit-text-input" data-bind="value: selectedLetteringVO().text, valueUpdate: 'input', enable: editTextEnabled(), visible: strictTemplate(), style: { textAlign: selectedLetteringVO().formatVO().textAlign }" type="text" placeholder="Your text here"></textarea>
                    <div id="text-align-group" class="btn-group" data-toggle="buttons" data-bind="radio: selectedLetteringVO().formatVO().textAlign">
                        <label id="text-align-left-btn" class="btn btn-default" data-bind="css: { disabled: !textAlignEnabled() }">
                            <input type="radio" name="rb-text-align-group" value="left" data-bind="enable: textAlignEnabled()">
                        </label>
                        <label id="text-align-center-btn" class="btn btn-default" data-bind="css: { disabled: !textAlignEnabled() }">
                            <input type="radio" name="rb-text-align-group" value="center" data-bind="enable: textAlignEnabled()">
                        </label>
                        <label id="text-align-right-btn" class="btn btn-default" data-bind="css: { disabled: !textAlignEnabled() }">
                            <input type="radio" name="rb-text-align-group" value="right" data-bind="enable: textAlignEnabled()">
                        </label>
                    </div>
                    <button class="btn btn-default" id="add-text-btn" type="button" data-bind="click: addText, enable: selectedLetteringVO().text().length > 0, visible: !strictTemplate()">Add</button>
                    <div class="divider"></div>
                    <h6>Font options</h6>
                    <div class="btn-group">
                        <button class="btn btn-default" type="button" id="font-btn" data-bind="text: selectedFont().name, style: { fontFamily: selectedFont().fontFamily }" data-toggle="dropdown"></button>
                        <button class="btn btn-default dropdown-toggle" type="button" id="font-dropdown-btn" data-toggle="dropdown">
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" id="font-list" data-bind="foreach: fonts" style="height: 300px; overflow-y: scroll;">
                            <li data-bind="css: { active: $root.selectedLetteringVO().formatVO().fontFamily() === $data.fontFamily }">
                                <a data-bind="text: $data.name, click: $root.selectFont, style: { fontFamily: $data.fontFamily }"></a>
                            </li>
                        </ul>
                    </div>
                    <div id="text-font-options">
                        <button class="btn btn-default" type="button" id="bold-toggle-btn" data-bind="checkbox: selectedLetteringVO().formatVO().bold, enable: selectedFont().boldAllowed"><span>B</span></button>
                        <button class="btn btn-default" type="button" id="italic-toggle-btn" data-bind="checkbox: selectedLetteringVO().formatVO().italic, enable: selectedFont().italicAllowed"><span>I</span></button>
                        <input id="text-fill-color-picker" type="text" class="designer-color-picker" data-bind="colorPicker: selectedLetteringVO().formatVO().fillColor, colorPalette: colors" />
                        <input id="text-stroke-color-picker" type="text" class="designer-color-picker" data-bind="colorPicker: selectedLetteringVO().formatVO().strokeColor, colorPalette: strokeColors" />
                    </div>
                    <div class="divider"></div>
                    <h6 data-bind="visible: showLetterSpacingSlider()">Letter Spacing</h6>
                    <div id="text-letter-spacing-slider" class="noUiSlider" data-bind="slider: selectedLetteringVO().formatVO().letterSpacing, rangeStart: 0, rangeEnd: 20, step: 1, visible: showLetterSpacingSlider()"></div>
                    <h6 data-bind="visible: showLineLeadingSlider()">Line Spacing</h6>
                    <div id="text-line-leading-slider" class="noUiSlider" data-bind="slider: selectedLetteringVO().formatVO().lineLeading, rangeStart: 0, rangeEnd: 3, step: 0.05, decimals: 2, visible: showLineLeadingSlider()"></div>
                    <h6 data-bind="visible: showTextEffects()">Text Effects</h6>
                    <div data-bind="visible: showTextEffects()" class="btn-group">
                        <button class="btn btn-default" type="button" id="text-effects-btn" data-bind="text: selectedTextEffectVO().label()" data-toggle="dropdown"><span class="caret"></span></button>
                        <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" data-bind="foreach: textEffects" style="height: 150px; overflow-y: scroll;">
                            <li data-bind="css: { active: $root.selectedTextEffectVO().name() === $data.name }">
                                <a data-bind="text: $data.label, click: $root.selectTextEffect"></a>
                            </li>
                        </ul>
                    </div>

                    <!--<div class="divider"></div>-->
                    <h6 data-bind="visible: showEffectsSlider(), text: selectedTextEffectVO().paramName()"></h6>
                    <div id="text-effect-slider" class="noUiSlider" data-bind="visible: showEffectsSlider(), slider: selectedTextEffectVO().value, rangeStart: selectedTextEffectVO().min(), rangeEnd: selectedTextEffectVO().max(), step: selectedTextEffectVO().step(), decimals:2"></div>
                    <div class="divider" data-bind="visible: selectedProductSizeVO().notEmpty"></div>
                    <div id="text-form-size" data-bind="visible: selectedProductSizeVO().notEmpty">
                        <div>
                            <h6 id="text-form-size-label">Size</h6>
                            <input id="text-width" class="form-control" type="text" data-bind="value: selectedObjectPropertiesVO().width, event: { keypress: selectedObjectPropertiesVO().updateWidth }" />
                            <span id="text-form-size-label-seperator">&times;</span>
                            <input id="text-height" class="form-control" type="text" data-bind="value: selectedObjectPropertiesVO().height, event: { keypress: selectedObjectPropertiesVO().updateHeight }" />
                        </div>
                        <div>
                            <button class="btn btn-default" id="text-form-size-apply-btn" type="button">Apply</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>