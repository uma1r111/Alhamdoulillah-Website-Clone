# Al-Hamdoulillah-Website


## Media Files
Media files are located in one drive on below shared path, 


https://imperiumdynamicscom.sharepoint.com/:f:/s/ImperiumDynamicsContentBlogsArticlesWhite-papers/EjJBjbzGDw1DhMWRJ7GAU2IBic61Xh22New0ZxAVEQQlWw?e=zJvbng

Any changes to media files, needs to be updated here before moving to production site. 


## Setup code in Local System

1. Open apache httpd.conf and load filter_module & deflate_module
2. Comment out rewrite rules in .htaccess files
3. Open httpd.conf and change directory and document root to C:/xampp/htdocs/Alhamdoulillah folder
4. Now go to apache/conf/extra/httpd-xampp.conf and update the following code, 

```
<FilesMatch "\.(php|html)$">
    SetHandler application/x-httpd-php
</FilesMatch>
<FilesMatch "\.phps$">
    SetHandler application/x-httpd-php-source
</FilesMatch>
```

