<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6">
            <div id="canvas-container">
                <!-- DesignerJS core goes here -->
            </div>
        </div>
        <div class="col-lg-5 col-lg-offset-1">
            <div class="designer_main-menu">
                <a class="btn btn-default js-designer-tab active" href="products-tab"
                   data-bind="css: {selected: isProductSelected}">
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
    </div>
</div>