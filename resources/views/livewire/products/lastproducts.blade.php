<div>
    <style>
        .products-list {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .product-list-in-box>.item {
            -webkit-box-shadow: none;
            box-shadow: none;
            border-radius: 0;
            border-bottom: 1px solid #f4f4f4;
        }

        .box-footer {
            border-top-left-radius: 0;
            border-top-right-radius: 0;
            border-bottom-right-radius: 3px;
            border-bottom-left-radius: 3px;
            border-top: 1px solid #f4f4f4;
            padding: 10px;
            background-color: #fff;
        }

        .products-list>.item {
            border-radius: 3px;
            -webkit-box-shadow: 0 1px 1px rgb(0 0 0 / 10%);
            box-shadow: 0 1px 1px rgb(0 0 0 / 10%);
            padding: 10px 0;
            background: #fff;
        }

        .products-list .product-img img {
            width: 50px;
            height: 50px;
        }

        .products-list .product-img {
            float: left;
        }

        .products-list>.item:before,
        .products-list>.item:after {
            content: " ";
            display: table;
        }

        .products-list>.item:after {
            clear: both;
        }

        .products-list>.item:before,
        .products-list>.item:after {
            content: " ";
            display: table;
        }

        :after,
        :before {
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }

        .products-list .product-img {
            float: left;
        }

        .products-list .product-info {
            margin-left: 60px;
        }

        .products-list .product-title {
            font-weight: 600;
        }

        .products-list {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .products-list .product-title {
            font-weight: 600;
        }

        .products-list .product-description {
            display: block;
            color: #999;
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
        }
    </style>
    <div class="box-body">
        <ul class="products-list product-list-in-box">

            @foreach ($data as $product)
                <li class="item">
                    <div class="product-img">
                        <img src="{{ asset('storage/products/' . $product->imagen) }}" width="70"
                            alt="imagen de ejemplo" class="rounded">
                    </div>
                    <div class="product-info">
                        <a href="javascript::void(0)" class="product-title"> {{ $product->name }} <span
                                class="label label-info pull-right">450.00</span></a>
                        <span class="product-description">
                        </span>
                    </div>
            @endforeach
            </li><!-- /.item -->
        </ul>
    </div><!-- /.box-body -->
    <div class="box-footer text-center">
        <a href="products.php" class="uppercase">Ver todos los productos</a>
    </div><!-- /.box-footer -->
</div>
