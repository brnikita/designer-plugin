<div id="main-container" class="main-container clearfix">
    <div id="designer-init-preloader" data-bind="visible: !$root.status().completed">
        <h5 data-bind="text: $root.status().message" class="text-center text-info"></h5>

        <div class="progress">
            <div class="progress-bar progress-bar-striped active" role="progressbar"
                 data-bind="style: { width: $root.percentCompleted() }"></div>
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
                    <div class="products-back-btn"
                         data-bind="click: backToCategoriesList, visible: backToCategoriesVisible">
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
                            <svg
                                data-bind="visible: $data.value.toLocaleLowerCase() === $root.selectedProductElementColor().value().toLocaleLowerCase(), style: {fill: value == '#FFFFFF' ? '#A3A2A4': value}"
                                id="color-select-arrow" xmlns="http://www.w3.org/2000/svg" xml:space="preserve"
                                width="24px" height="24px" version="1.1"
                                style="shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd"
                                viewBox="0 0 24 24" xmlns:xlink="http://www.w3.org/1999/xlink">
                              <g>
                                  <g>
                                      <path class="fil1"
                                            d="M6 12c0,0 0,0 0,0 0,0 0,0 1,0l3 3 7 -7c1,0 1,0 1,0 0,0 0,0 0,0l-8 8 0 0 0 0 -4 -4z"/>
                                  </g>
                              </g>
                        </svg>
                        </a>
                    </li>
                </ul>

            </div>

            <div id="text-tab" class="hide">
                <div class="text-tab-desktop">
                    <div class="text-tab__title clearfix">
                        <div class="text-tab__title__text text-tab-title">
                            Add/Edit Text layers
                        </div>
                        <div class="text-tab__title__button">
                            <button id="add-text-btn" class="text-controls-sprite add-text-btn" type="button"
                                    data-bind="click: addText, enable: selectedLetteringVO().text().length > 0, visible: !strictTemplate()"></button>
                        </div>
                    </div>
                    <div class="text-tab__text">
                <textarea id="add-text-input"
                          data-bind="value: selectedLetteringVO().text, valueUpdate: 'input', enable: editTextEnabled(), visible: !strictTemplate(), style: { textAlign: selectedLetteringVO().formatVO().textAlign }"
                          type="text" placeholder="Type here..."></textarea>
                    </div>
                    <div data-bind="visible: textToolsIsVisible" class="clearfix font-select">
                        <div class="text-tab-label font-select-label">
                            SELECT FONT
                        </div>
                        <div class="font-select-sign">
                            <button class="text-controls-sprite text-control-t" type="button"
                                    data-bind="click: toggleFontsList"></button>
                        </div>
                        <div class="text-tab-label font-select-color-label">
                            CHOOSE A COLOR
                        </div>
                        <div class="font-select-color-picker">
                            <a class="text-controls-choose-color" href="#" data-bind="style: {
                                'background-color': selectedLetteringVO().formatVO().fillColor,
                                'color': selectedLetteringVO().formatVO().fillColor,
                                'border-color': selectedLetteringVO().formatVO().fillColor
                                },
                                 click: toggleFontsColorsList"></a>
                        </div>
                    </div>
                    <div class="fonts-colors" data-bind="visible: showFontsColorsList">
                        <div class="text-tab-title">
                            Change the look of your text
                        </div>
                        <a href="#" class="fonts-colors__close"
                           data-bind="click: toggleFontsColorsList"></a>
                        <ul class="colors-palette clearfix" data-bind="foreach: colors">
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
                    ">
                                    <svg
                                        data-bind="style: {fill: value == '#FFFFFF' ? '#A3A2A4': value}"
                                        id="color-select-arrow" xmlns="http://www.w3.org/2000/svg" xml:space="preserve"
                                        width="24px" height="24px" version="1.1"
                                        style="shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd"
                                        viewBox="0 0 24 24" xmlns:xlink="http://www.w3.org/1999/xlink">
                              <g>
                                  <g>
                                      <path class="fil1"
                                            d="M6 12c0,0 0,0 0,0 0,0 0,0 1,0l3 3 7 -7c1,0 1,0 1,0 0,0 0,0 0,0l-8 8 0 0 0 0 -4 -4z"/>
                                  </g>
                              </g>
                        </svg>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="font-list" data-bind="visible: showFontsList">
                        <a href="#" class="font-list__close" data-bind="click: toggleFontsList"></a>
                        <ul data-bind="foreach: fonts">
                            <li class="font-list__item"
                                data-bind="css: { active: $root.selectedLetteringVO().formatVO().fontFamily() === $data.fontFamily }">
                                <a href="#"
                                   data-bind="text: $data.name, click: $root.selectFont, style: { fontFamily: $data.fontFamily }"></a>
                            </li>
                        </ul>
                    </div>
                    <div data-bind="visible: textToolsIsVisible" class="text-align-outline clearfix">
                        <div class="text-tab-label text-align-outline__al-lbl">ALIGN TEXT</div>
                        <div data-toggle="buttons" class="text-align-outline__al"
                             data-bind="radio: selectedLetteringVO().formatVO().textAlign">
                            <label id="text-align-left-btn" for="text-align-left"
                                   class="text-control-align text-control-align-left text-controls-sprite"
                                   data-bind="css: { disabled: !textAlignEnabled() }">
                                <input type="radio" value="left"
                                       data-bind="enable: textAlignEnabled()" name="text-align-control"
                                       id="text-align-left">
                            </label>
                            <label id="text-align-center-btn" for="text-align-center"
                                   class="text-control-align text-control-align-center text-controls-sprite"
                                   data-bind="css: { disabled: !textAlignEnabled() }">
                                <input type="radio" value="center"
                                       data-bind="enable: textAlignEnabled()" name="text-align-control"
                                       id="text-align-center">
                            </label>
                            <label id="text-align-right-btn"
                                   class="text-control-align text-control-align-right text-controls-sprite"
                                   data-bind="css: { disabled: !textAlignEnabled() }" for="text-align-right">
                                <input type="radio" value="right"
                                       data-bind="enable: textAlignEnabled()" name="text-align-control"
                                       id="text-align-right">
                            </label>
                        </div>
                        <div class="text-tab-label text-align-outline__outl-lbl">
                            ADD AN OUTLINE
                        </div>
                        <div class="text-align-outline__outl-picker">
                            <a class="text-controls-choose-color" href="#" data-bind="style: {
                                'background-color': selectedLetteringVO().formatVO().strokeColor,
                                'color': selectedLetteringVO().formatVO().strokeColor,
                                'border-color': selectedLetteringVO().formatVO().strokeColor
                                },
                                 click: toggleFontsStrokeColorsList"></a>
                        </div>
                    </div>
                    <div class="fonts-colors" data-bind="visible: showFontsStrokeColorsList">
                        <div class="text-tab-title">
                            Change the look of your text
                        </div>
                        <a href="#" class="fonts-colors__close"
                           data-bind="click: toggleFontsStrokeColorsList"></a>
                        <ul class="colors-palette clearfix" data-bind="foreach: strokeColors">
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
                    ">
                                    <svg
                                        data-bind="style: {fill: value == '#FFFFFF' ? '#A3A2A4': value}"
                                        id="color-select-arrow" xmlns="http://www.w3.org/2000/svg" xml:space="preserve"
                                        width="24px" height="24px" version="1.1"
                                        style="shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd"
                                        viewBox="0 0 24 24" xmlns:xlink="http://www.w3.org/1999/xlink">
                              <g>
                                  <g>
                                      <path class="fil1"
                                            d="M6 12c0,0 0,0 0,0 0,0 0,0 1,0l3 3 7 -7c1,0 1,0 1,0 0,0 0,0 0,0l-8 8 0 0 0 0 -4 -4z"/>
                                  </g>
                              </g>
                        </svg>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div data-bind="visible: textToolsIsVisible" class="clearfix text-transform-slider">
                        <div class="text-tab-label">RESIZE TEXT</div>
                        <div class="text-control-slider">
                            <div class="noUiSlider"
                                 data-bind="slider: selectedLetteringVO().formatVO().fontSize, rangeStart: 10, rangeEnd: 200, step: 1, visible: showLetterSpacingSlider()"></div>
                        </div>
                    </div>

                    <div data-bind="visible: textToolsIsVisible" class="clearfix text-transform-slider">
                        <div class="text-tab-label">ROTATE TEXT</div>
                        <div class="text-control-slider">
                            <div class="noUiSlider"
                                 data-bind="slider: selectedLetteringVO().formatVO().rotation, rangeStart: 0, rangeEnd: 360, step: 1, visible: showLetterSpacingSlider()"></div>
                        </div>
                    </div>

                    <div data-bind="visible: textToolsIsVisible" class="clearfix text-transform-slider">
                        <div class="text-tab-label">LETTER SPACE</div>
                        <div class="text-control-slider">
                            <div class="noUiSlider"
                                 data-bind="slider: selectedLetteringVO().formatVO().letterSpacing, rangeStart: 0, rangeEnd: 20, step: 1, visible: showLetterSpacingSlider()"></div>
                        </div>
                    </div>

                    <div data-bind="visible: showLineLeadingSlider()" class="clearfix text-transform-slider">
                        <div class="text-tab-label">LINE HEIGHT</div>
                        <div class="text-control-slider">
                            <div id="text-line-leading-slider" class="noUiSlider"
                                 data-bind="slider: selectedLetteringVO().formatVO().lineLeading, rangeStart: 0, rangeEnd: 3, step: 0.05, decimals: 2"></div>
                        </div>
                    </div>

                    <div class="text-tab-title" data-bind="visible: textToolsIsVisible">
                        Apply a text effect
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

                <div class="text-tab-mobile">
                    <div class="text-tab__text clearfix">
                        <textarea id="add-text-input" class="add-text-input"
                                  data-bind="value: selectedLetteringVO().text, valueUpdate: 'input', enable: editTextEnabled(), visible: !strictTemplate(), style: { textAlign: selectedLetteringVO().formatVO().textAlign }"
                                  type="text" placeholder="Type here..."></textarea>

                        <div class="add-text-main-tools">
                            <div class="clearfix">
                                <div class="font-select-sign">
                                    <button class="text-controls-sprite text-control-t" type="button"
                                            data-bind="click: toggleFontsList"></button>
                                </div>

                                <div class="font-select-color-picker">
                                    <a class="text-controls-choose-color" href="#" data-bind="style: {
                                'background-color': selectedLetteringVO().formatVO().fillColor,
                                'color': selectedLetteringVO().formatVO().fillColor,
                                'border-color': selectedLetteringVO().formatVO().fillColor
                                },
                                 click: toggleFontsColorsList"></a>
                                </div>

                                <div class="text-align-outline__outl-picker">
                                    <a class="text-controls-choose-color" href="#" data-bind="style: {
                                'background-color': selectedLetteringVO().formatVO().strokeColor,
                                'color': selectedLetteringVO().formatVO().strokeColor,
                                'border-color': selectedLetteringVO().formatVO().strokeColor
                                },
                                 click: toggleFontsStrokeColorsList"></a>
                                </div>
                                <div class="text-tab__title__button">
                                    <button id="add-text-btn" class="text-controls-sprite add-text-btn" type="button"
                                            data-bind="click: addText, enable: selectedLetteringVO().text().length > 0, visible: !strictTemplate()"></button>
                                </div>
                            </div>
                            <div class="clearfix">
                                <div data-toggle="buttons" class="text-align-outline__al"
                                     data-bind="radio: selectedLetteringVO().formatVO().textAlign">
                                    <label id="text-align-left-btn" for="text-align-left"
                                           class="text-control-align text-control-align-left text-controls-sprite"
                                           data-bind="css: { disabled: !textAlignEnabled() }">
                                        <input type="radio" value="left"
                                               data-bind="enable: textAlignEnabled()" name="text-align-control"
                                               id="text-align-left">
                                    </label>
                                    <label id="text-align-center-btn" for="text-align-center"
                                           class="text-control-align text-control-align-center text-controls-sprite"
                                           data-bind="css: { disabled: !textAlignEnabled() }">
                                        <input type="radio" value="center"
                                               data-bind="enable: textAlignEnabled()" name="text-align-control"
                                               id="text-align-center">
                                    </label>
                                    <label id="text-align-right-btn"
                                           class="text-control-align text-control-align-right text-controls-sprite"
                                           data-bind="css: { disabled: !textAlignEnabled() }" for="text-align-right">
                                        <input type="radio" value="right"
                                               data-bind="enable: textAlignEnabled()" name="text-align-control"
                                               id="text-align-right">
                                    </label>
                                </div>
                                <div>
                                    <button class="text-controls-sprite text-controls-show-more"></button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="fonts-colors" data-bind="visible: showFontsColorsList">
                        <a href="#" class="fonts-colors__close"
                           data-bind="click: toggleFontsColorsList"></a>
                        <ul class="colors-palette clearfix" data-bind="foreach: colors">
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
                    ">
                                    <svg
                                        data-bind="style: {fill: value == '#FFFFFF' ? '#A3A2A4': value}"
                                        id="color-select-arrow" xmlns="http://www.w3.org/2000/svg" xml:space="preserve"
                                        width="24px" height="24px" version="1.1"
                                        style="shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd"
                                        viewBox="0 0 24 24" xmlns:xlink="http://www.w3.org/1999/xlink">
                              <g>
                                  <g>
                                      <path class="fil1"
                                            d="M6 12c0,0 0,0 0,0 0,0 0,0 1,0l3 3 7 -7c1,0 1,0 1,0 0,0 0,0 0,0l-8 8 0 0 0 0 -4 -4z"/>
                                  </g>
                              </g>
                        </svg>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="font-list" data-bind="visible: showFontsList">
                        <a href="#" class="font-list__close" data-bind="click: toggleFontsList"></a>
                        <ul data-bind="foreach: fonts">
                            <li class="font-list__item"
                                data-bind="css: { active: $root.selectedLetteringVO().formatVO().fontFamily() === $data.fontFamily }">
                                <a href="#"
                                   data-bind="text: $data.name, click: $root.selectFont, style: { fontFamily: $data.fontFamily }"></a>
                            </li>
                        </ul>
                    </div>
                    <div class="fonts-colors" data-bind="visible: showFontsStrokeColorsList">
                        <div class="text-tab-title">
                            Change the look of your text
                        </div>
                        <a href="#" class="fonts-colors__close"
                           data-bind="click: toggleFontsStrokeColorsList"></a>
                        <ul class="colors-palette clearfix" data-bind="foreach: strokeColors">
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
                    ">
                                    <svg
                                        data-bind="style: {fill: value == '#FFFFFF' ? '#A3A2A4': value}"
                                        id="color-select-arrow" xmlns="http://www.w3.org/2000/svg" xml:space="preserve"
                                        width="24px" height="24px" version="1.1"
                                        style="shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd"
                                        viewBox="0 0 24 24" xmlns:xlink="http://www.w3.org/1999/xlink">
                              <g>
                                  <g>
                                      <path class="fil1"
                                            d="M6 12c0,0 0,0 0,0 0,0 0,0 1,0l3 3 7 -7c1,0 1,0 1,0 0,0 0,0 0,0l-8 8 0 0 0 0 -4 -4z"/>
                                  </g>
                              </g>
                        </svg>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div data-bind="visible: textToolsIsVisible" class="clearfix text-transform-slider">
                        <div class="text-tab-label">RESIZE TEXT</div>
                        <div class="text-control-slider">
                            <div class="noUiSlider"
                                 data-bind="slider: selectedLetteringVO().formatVO().fontSize, rangeStart: 10, rangeEnd: 200, step: 1, visible: showLetterSpacingSlider()"></div>
                        </div>
                    </div>

                    <div data-bind="visible: textToolsIsVisible" class="clearfix text-transform-slider">
                        <div class="text-tab-label">ROTATE TEXT</div>
                        <div class="text-control-slider">
                            <div class="noUiSlider"
                                 data-bind="slider: selectedLetteringVO().formatVO().rotation, rangeStart: 0, rangeEnd: 360, step: 1, visible: showLetterSpacingSlider()"></div>
                        </div>
                    </div>

                    <div data-bind="visible: textToolsIsVisible" class="clearfix text-transform-slider">
                        <div class="text-tab-label">LETTER SPACE</div>
                        <div class="text-control-slider">
                            <div class="noUiSlider"
                                 data-bind="slider: selectedLetteringVO().formatVO().letterSpacing, rangeStart: 0, rangeEnd: 20, step: 1, visible: showLetterSpacingSlider()"></div>
                        </div>
                    </div>

                    <div data-bind="visible: showLineLeadingSlider()" class="clearfix text-transform-slider">
                        <div class="text-tab-label">LINE HEIGHT</div>
                        <div class="text-control-slider">
                            <div id="text-line-leading-slider" class="noUiSlider"
                                 data-bind="slider: selectedLetteringVO().formatVO().lineLeading, rangeStart: 0, rangeEnd: 3, step: 0.05, decimals: 2"></div>
                        </div>
                    </div>

                    <div class="text-tab-title" data-bind="visible: textToolsIsVisible">
                        Apply a text effect
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
                        <div class="graphics-back-btn"
                             data-bind="visible: graphicSelectedSubcategory, click: backGraphicItem">
                            Back
                        </div>
                        <ul data-bind="foreach: currentGraphics , css: { narrow: graphicSelectedSubcategory }">
                            <li data-bind="
                                    click: $root.selectGraphicItem,
                                    css: { category: isCategory(),
                                    image: isImage() },
                                    style: { backgroundImage: 'url(' + categoryThumb() + ')' }">
                                <a data-bind="visible: isImage()">
                                    <img src="#" data-bind="attr: { src: thumb }" alt=""/>
                                    <span data-bind="text: name"></span>
                                </a>
                                <a data-bind="visible: isCategory()">
                                    <img src="#" data-bind="attr: { src: thumb }" alt=""/>
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

                    <p>Please note that in order to use a design (photo, image, text, brand or saying) you must have
                        full rights to use this design.</p>

                    <p>By uploading or saving a design you agree that:</p>
                    <ol>
                        <li>You hold the rights to commercially reproduce this design.</li>
                        <li>You also release us from any claims made as a result of any copyright infringement.</li>
                        <li>You understand that infringement of copyright is illegal. If you have any doubt as to the
                            legal ownership of a design you should check with the rightful owner that you are able to
                            use the design before uploading.
                        </li>
                        <li>You understand that we act under your instructions and is not obligated in any way to check
                            or confirm the legal use of reproducing any designs.
                        </li>
                    </ol>
                    <p class="graphics-upload-form__info">Graphics Information</p>

                    <p>Designer supports jpeg, gif, png and svg formats. All images need to have a minimum resolution of
                        150 dpi.</p>
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
                                ">
                                    <svg
                                        data-bind="visible: $data.value.toLocaleLowerCase() === $root.selectedProductElementColor().value().toLocaleLowerCase(), style: {fill: value == '#FFFFFF' ? '#A3A2A4': value}"
                                        id="color-select-arrow" xmlns="http://www.w3.org/2000/svg" xml:space="preserve"
                                        width="24px" height="24px" version="1.1"
                                        style="shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd"
                                        viewBox="0 0 24 24" xmlns:xlink="http://www.w3.org/1999/xlink">
                                      <g>
                                          <g>
                                              <path class="fil1"
                                                    d="M6 12c0,0 0,0 0,0 0,0 0,0 1,0l3 3 7 -7c1,0 1,0 1,0 0,0 0,0 0,0l-8 8 0 0 0 0 -4 -4z"/>
                                          </g>
                                      </g>
                                </svg>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div id="numbers-tab" class="hide">
                <div class="numbers-tab-controls">
                    <a data-bind="click: addNameObj">
                        <span>Add name</span></a>
                    <a data-bind="click: addNumberObj">
                        <span>Add number</span>
                    </a>
                    <!--<a data-bind="">
                        <span>Order Sheet</span>
                    </a>-->
                </div>
                <p>
                    Number & Names Order Sheet
                </p>

                <p>
                    NOTE: If you require only a name or only a number, simply
                    leave the field that is not required blank.
                </p>

                <ul class="order-sheet-caption" data-bind="visible: namesNumbers().length > 0">
                    <span>Names</span>
                    <span>Numbers</span>
                    <span>Size</span>
                </ul>

                <ol class="order-sheet-caption" data-bind="foreach: namesNumbers">
                    <li>
                        <ul class="">
                            <li>
                                <input class="order-item-number" type="text" data-bind="value: $data.number"
                                       placeholder="00"/>
                            </li>
                            <li>
                                <input class="order-item-name" type="text" data-bind="value: $data.name"
                                       placeholder="Name"/>
                            </li>
                            <li>
                                <select class="order-item-size" data-bind="
                                    visible: $root.selectedProductVO().sizes().length > 1,
                                    options: $root.selectedProductVO().sizes,
                                    value: $data.size
                                "></select>
                                <span></span>
                            </li>
                            <li>
                                <a class="order-item-remove" data-bind="click: $parent.removeNameNumber"
                                   class="close"></a>
                            </li>
                        </ul>
                    </li>
                </ol>
                <div style="text-align: left;">
                    <a class="" data-bind="click: addNameNumber">+ Add more names and/or numbers
                    </a>
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
                                data-bind="click: addQuantity, visible: $root.selectedProductVO().sizes().length > 0">
                            Add
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

                    <a class="carousel-left carousel-control" href="#colors-palette-carousel" role="button"
                       data-slide="prev">
                        <svg class="color-palette-arrows" xmlns="http://www.w3.org/2000/svg" xml:space="preserve"
                             width="12px" height="24px" version="1.1"
                             style="shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd"
                             viewBox="0 0 12 24"
                             xmlns:xlink="http://www.w3.org/1999/xlink">
                             <g>
                                 <path class="fil0"
                                       d="M9 4c1,0 1,0 1,0 0,0 0,1 0,1l-7 7 7 7c0,0 0,1 0,1 0,0 0,0 -1,0l-7 -8 0 0 0 0 7 -8z"/>
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
                                        <svg
                                            data-bind="visible: $data.value.toLocaleLowerCase() === $root.selectedProductElementColor().value().toLocaleLowerCase(), style: {fill: value == '#FFFFFF' ? '#A3A2A4': value}"
                                            id="color-select-arrow" xmlns="http://www.w3.org/2000/svg"
                                            xml:space="preserve" width="24px" height="24px" version="1.1"
                                            style="shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd"
                                            viewBox="0 0 24 24" xmlns:xlink="http://www.w3.org/1999/xlink">
                                      <g>
                                          <g>
                                              <path class="fil1"
                                                    d="M6 12c0,0 0,0 0,0 0,0 0,0 1,0l3 3 7 -7c1,0 1,0 1,0 0,0 0,0 0,0l-8 8 0 0 0 0 -4 -4z"/>
                                          </g>
                                      </g>
                                </svg>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>

                    <a class="carousel-right carousel-control" href="#colors-palette-carousel" role="button"
                       data-slide="next">
                        <svg class="color-palette-arrows" xmlns="http://www.w3.org/2000/svg" xml:space="preserve"
                             width="12px" height="24px" version="1.1"
                             style="shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd"
                             viewBox="0 0 12 24"
                             xmlns:xlink="http://www.w3.org/1999/xlink">
                             <g>
                                 <path class="fil0"
                                       d="M3 4c-1,0 -1,0 -1,0 0,0 0,1 0,1l7 7 -7 7c0,0 0,1 0,1 0,0 0,0 1,0l7 -8 0 0 0 0 -7 -8z"/>
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

