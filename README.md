
## ⚡ **طريقة الاستخدام**

### 1️⃣ تثبيت المشروع
```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
````

### 2️⃣ إنشاء Domains

يمكنك إنشاء دومين جديد باستخدام الـ Artisan Command:

```bash
php artisan make:domain Project
php artisan make:domain Task
php artisan make:domain Sprint
php artisan make:domain Team
```

> سيقوم بإنشاء:
>
> * Domain layer
> * Infrastructure layer (Eloquent Repositories)
> * HTTP layer (Controller / Request / Resource)
> * Skeleton CRUD جاهز


## 📦 **مميزات المشروع**

* Architecture بسيطة وواضحة (DOL)
* Layered Separation: Domain, Infrastructure, Interface
* CRUD Skeleton جاهز لكل Domain
* سهل التوسع لإضافة UseCases جديدة أو Integrations
* مستقل عن Laravel داخل الـ Domain layer





## 💻 Author

* Ali Ehab Algmass
* Backend Laravel Developer / Software Engineer



