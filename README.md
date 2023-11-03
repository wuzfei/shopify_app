
## 安装步骤

1. Install your composer dependencies:

    ```shell
    chmod -R 0766 storage && composer install 
    ```

2. Bootstrap the default [SQLite](https://www.sqlite.org/index.html) database and add it to your `.env` file:

    ```shell
    touch storage/db.sqlite
    ```
3. Generate an `APP_KEY` for your app:

    ```shell
    php artisan key:generate
    ```
4. Create the necessary Shopify tables in your database:

    ```shell
    php artisan migrate
    ```
## 修改.env配置文件

    #app名称
    APP_NAME="RedirectApp"

    #访问该项目的地址，shopify出于安全考虑，强制https
    HOST=https://4dbe-219-133-178-102.ngrok-free.app

    #应用的key和secret，在应用概率处找到
    SHOPIFY_API_KEY=97fdcc4317c6ed33cf5af7eb18cad934
    SHOPIFY_API_SECRET=75bfed98a4f6d75415294b1b5e84c8e6
    
    #固定填这个
    SCOPES=write_products

    #安装成功通过后，要跳转的地址，为空则不跳转，最好是上架成功后，在添加这个跳转地址
    REDIRECT_URL=