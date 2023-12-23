# Morph - Initial Thoughts

## Problem Statement - Arabic

> أهلا وسهلا شكرا لتواصلك معنا وسعيدين بكونك جزء من فريق مورف في برنامج التدريب
> لقبولك للتدريب يتوجب عليك بناء مشروع بسيط باستخدام
> Laravel Filament
> https://filamentphp.com/
>
> المشروع عبارة عن لوحة تحكم تمكن لكل مستخدم التسجيل والدخول وإضافة المنشورات ويمكن للمستخدمين الآخرين رؤية المنشورات والتعليق عليها مع وجود حساب للإدارة لإمكانية حذف المنشورات الغير مناسبة
>
> لا يوجد متطلبات للمشروع يمكنك الإبداع فيه حسب رؤيتك برمجيا ونتوقع منك تسليم المشروع خلال 10 أيام من تاريخ إرسال البريد الإلكتروني
>
> مطلوب منك رفع المشروع على حسابك في github والرد على البريد الإلكتروني بالمشروع
>
> نتطلع لإبداعك

## Problem Statement - English

> Welcome, thank you for contacting us and we are happy for being a part of Morph Team in Training Program
>
> To proceed further with the Internship, you should build a simple project using Laravel Filament
>
> https://filamentphp.com
>
> The project is a dashboard that enables every user to authenticate and add posts, the other users can view and comment on different posts. There will be an admin account who will be able to delete inappropriate posts
>
> There is no requirements for the project, you have the ability to implement/deevlop it on your preference. We expect you to submit the project within 10 days from receiving this email
>
> You should push your project to your GitHub account and replying to this email with the project
>
> Waiting for your work 🔥

---

## Questions

- Can user edit/delete his post?
- Can users like/dislike the post?
  - Like/Unlike is also an idea
- What's needed from Laravel to learn Filament?
  - Ask Laravel expert
  - Ask AI

---

## Self Talk

- Backend => very top priority
- Minimal but don't give up your values
  - Accessible (Alt text - UX - Responsiveness)
  - SEO Friendly
  - Clean
- Project Tasks
  - Routing
  - Database Design
  - Athentication & Authorization
  - Views Setup
  - Views Styling
  - Dashbaord Creation & Setup
  - Admin Creation & Setup

---

## Technology Stack

- **Backend: Laravel + Filament + Blade (Problem Statement)**
- Frontend: TypeScript + Vue.js
  - If we needed
- Styling: Vanilla CSS
- Database: PostgreSQL

---

## Steps

Database Design ==> Create New Laravel project ==> Create Models, Schemas & Seeders ==> Migrate ==> Routing ==> Views Setup & Components Creation ==> Controllers ==> Authentication & Authorization ==> Dashboard Creation & Setup ==> Admin Creation & Setup ==> Views Styling

### ChatGPT Suggestion

Your proposed flow looks generally well-organized, covering essential steps in building a Laravel Filament project. However, the order can be adjusted a bit to ensure a smoother development process. Here's a refined flow that you might find effective:

1. **Create New Laravel Project:**

   - Start by creating a new Laravel project using the `composer create-project` command.

2. **Database Design:**

   - Before creating models and schemas, plan your database structure. Define the tables, relationships, and fields you need for users, posts, comments, and the admin.

3. **Create Models, Schemas & Seeders:**

   - Create Eloquent models for users, posts, comments, and any other entities you need. Develop database migrations and seeders to populate your database with sample data for testing.

4. **Migrate:**

   - Run the migrations to create the database tables and seed the initial data.

5. **Authentication & Authorization:**

   - Implement user authentication and authorization. Laravel provides built-in features for this, and Filament can leverage Laravel's authentication system.

6. **Routing:**

   - Define routes for your application, including routes for authentication, creating, viewing, and commenting on posts.

7. **Controllers:**

   - Create controllers to handle the logic behind your routes. This includes controllers for user actions, post creation, and comment handling.

8. **Views Setup & Components Creation:**

   - Set up the views for your application, creating components as needed. Filament has its UI components, so make sure to integrate them effectively.

9. **Dashboard Creation & Setup:**

   - Utilize Filament to create the admin dashboard. Define resources for users, posts, and comments. Set up filters, actions, and any other customizations needed.

10. **Admin Creation & Setup:**

    - Create an admin account with the necessary permissions. Filament provides tools for managing roles and permissions, so use them to grant the admin the ability to delete inappropriate posts.

11. **Views Styling:**

    - Once the functionality is in place, focus on styling your views to enhance the user experience. You can use CSS frameworks or preprocessors for styling.

12. **Testing:**

    - Throughout the development process, conduct testing to ensure that each component of your application works as expected. Test user authentication, post creation, commenting, and admin functionality.

13. **Documentation:**

    - Document your code, especially if you plan to share your project with others. Include instructions on how to set up the project locally.

14. **Version Control (Optional but Recommended):**

    - Use Git for version control. Commit your changes regularly, and consider branching for specific features or bug fixes.

15. **Deployment:**
    - Once everything is tested and polished, deploy your Laravel Filament project to a production environment.

Remember that development is often an iterative process. You might find yourself going back and forth between steps as you refine your project. Additionally, adapt the flow based on your preferences and project requirements. Good luck with your Laravel Filament project!
