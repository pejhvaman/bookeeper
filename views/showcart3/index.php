<style>
    @font-face {
        font-family: 'sans';
        src: url("public/font/IRANsansWeb.ttf") format('truetype'), url('public/font/IRANsansWeb.eot?#iefix') format('embedded-opentype');
    }

    .sans {
        font-family: sans;
    }

    * {
        margin: 0;
        padding: 0;
        text-decoration: none;
        font-family: sans;
    }

    body {
        background: #00b894;
    }

    .card {
        width: 500px;
        background: #f1f1f1;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    .top-section {
        height: 600px;
        overflow: hidden;
        background: #fff;
        position: relative;
    }

    #image-container {
        width: 250px;
        height: 380px;
        margin: 24px 0 0 24px;
    }

    .price {
        position: absolute;
        top: 20px;
        right: 20px;
        color: #00b894;
        font-size: 24px;
        text-align: right;
    }
    .price_adad{
        font-size: 12pt;
        display: block;
    }

    .product-info {
        padding: 24px;
    }

    .name {
        text-align: right;
        text-transform: uppercase;
        font-size: 24px;
        color: #333;
    }

    .dis {
        text-align: right;
        font-size: 16px;
        opacity: .7;
    }

    .tedad{
        text-align: right;
        opacity: .6;
    }

    .Button {
        display: block;
        background: #00b894;
        text-align: center;
        color: #fff;
        padding: 10px;
        margin-top: 10px;
        transition: 0.3s;
    }

    .Button:hover {
        background: #333;
    }
</style>
<div class="card sans">
    <div class="top-section">
        <img id="image-container" src="public/images/orhan.jpg" alt="">
        <div class="price">
            <span class="price_adad">
                230,000
            </span>

            هزار تومان
        </div>
        <div class="product-info">
            <div class="name">نام کتاب</div>
            <div class="dis">نام کتابفروشی</div>
            <div class="tedad">
               تعداد :
                <span class="tedad_adad">
                    2
                </span>
            </div>
            <a class="Button" href="#">تایید و ادامه</a>
        </div>
    </div>
</div>
