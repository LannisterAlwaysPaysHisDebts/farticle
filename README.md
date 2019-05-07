## 目录结构

app: 项目目录
config: 配置文件
fast: 框架内核
public: 入口文件与静态文件
router: 路由配置


## nginx配置
nginx配置中加入: 
```
location / {
        try_files $uri $uri/ /index.php?$query_string;
}
```

会将所有请求都转入 index.php中，然后php通过下面两个方法拿到请求参数
```
// 获取完整的请求路径
$_SERVER['REQUEST_URI'];

// 请求参数
$_SERVER['QUERY_STRING']
```


