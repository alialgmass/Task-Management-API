تمام يا علي، هعمللك **README كامل جاهز للمشروع** يشرح **هيكل DOL + Domains + Layers + CRUD** وكيفية استخدامه.

---

# 📄 **README.md**

```markdown
# Task Management API - DOL Architecture

هذا المشروع عبارة عن **Task Management API** باستخدام **Laravel** مع **Domain-Oriented Layered Architecture (DOL)**.  
يحتوي على الدومينات التالية:  
- Project  
- Task  
- Sprint  
- Team  

---

## 🏗️ الهيكل العام للمشروع

```

app/
├── Domains/
│    ├── Project/
│    │     ├── Models/
│    │     ├── Services/
│    │     ├── Repositories/
│    │     ├── Actions/
│    │     ├── Rules/
│    │     ├── Jobs/
│    │     ├── Events/
│    │     └── Exceptions/
│    ├── Task/
│    ├── Sprint/
│    └── Team/
│
├── Infrastructure/
│    ├── Project/Eloquent/
│    ├── Task/Eloquent/
│    ├── Sprint/Eloquent/
│    └── Team/Eloquent/
│
└── Interfaces/Http/
├── Project/Controllers/
├── Project/Requests/
├── Project/Resources/
├── Task/Controllers/
└── (Sprint / Team same structure)

````

---

## 🧩 **شرح الـ Layers**

### 1️⃣ Domain Layer
- يحتوي على المنطق التجاري فقط.
- مستقل عن Laravel أو أي framework.
- يحتوي على:
  - **Models**: كائنات الدومين (Entities)
  - **Services**: منطق الأعمال
  - **Repositories**: Interfaces
  - **Actions**: Use-case actions
  - **Rules**: القواعد والتحققات
  - **Jobs / Events / Exceptions**: عناصر خاصة بالدومين

### 2️⃣ Infrastructure Layer
- يحتوي على تنفيذ **Repositories باستخدام Eloquent**.
- أي تكامل مع قواعد البيانات أو خدمات خارجية.

### 3️⃣ Interfaces / HTTP Layer
- Controllers / Requests / Resources
- يمثل الطبقة التي تتعامل مع Laravel HTTP.
- لا يحتوي على منطق تجاري.

---

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

