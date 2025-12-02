
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

### 3️⃣ Routes

* كل دومين له **Controller** جاهز CRUD.
* مثال في `routes/api.php`:

```php
use App\Interfaces\Http\Project\Controllers\ProjectController;

Route::apiResource('projects', ProjectController::class);
```

### 4️⃣ CRUD Operations

* **GET /projects** → قائمة المشاريع
* **POST /projects** → إنشاء مشروع
* **GET /projects/{id}** → عرض مشروع
* **PUT /projects/{id}** → تعديل مشروع
* **DELETE /projects/{id}** → حذف مشروع

> نفس الشيء لباقي الدومينات (Tasks / Sprint / Team)

---

## 📦 **مميزات المشروع**

* Architecture بسيطة وواضحة (DOL)
* Layered Separation: Domain, Infrastructure, Interface
* CRUD Skeleton جاهز لكل Domain
* سهل التوسع لإضافة UseCases جديدة أو Integrations
* مستقل عن Laravel داخل الـ Domain layer

---

## 🧪 **اختبار الدومين**

* كل Domain يمكن اختباره بشكل مستقل بدون Laravel.
* يمكن إنشاء Unit Tests مباشرة على Services / Actions / Rules.

---

## 🔧 **خطط التطوير المستقبلية**

* إضافة علاقات بين الدومينات:

    * Project → Tasks
    * Sprint → Tasks
    * Team → Projects / Tasks
* إضافة Authentication / Authorization
* إضافة Notifications / Events
* إضافة Jobs / Queues حسب الحاجة

---

## 💻 Author

* Ali Ehab Algmass
* Backend Laravel Developer / Software Engineer

```

