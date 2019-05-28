## 目录结构
app: 项目目录

config: 配置文件

fast: 框架内核

lib: 扩展库

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
## tag
1. 项目的分离与扩展: 比如目前有三个部分: admin, api与cli, 对于这三个部分属于同一项目的不同模块, 通过
继承特定的类来完成扩展,而不是编写属于admin或者api专有的类, 继承类的特定功能是相同的,只是实现的逻辑不同


## 入口
入口文件,Index入口类.入口类负责项目的初始化
1. 加载全局基础配置文件;
2. 自动加载;
3. 路由解析;
4. 建立容器;

## 路由
1. 在入口类里注册路由


