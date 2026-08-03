# Product Module Documentation

> Project: ShopHub Admin Panel
>
> Module: Product Management
>
> Status: ✅ Completed

---

# Overview

The Product module is the second major CRUD module of the ShopHub admin panel.

Unlike the Category module, the Product module introduces more complex business logic, multiple database relationships, file uploads, reusable components, filtering, searching, and a cleaner application architecture using Services and Form Requests.

The goal was not only to make CRUD work but also to build a module that is easy to maintain, extend, and scale.

---

# Thought Process

Instead of jumping directly into coding, the module was built layer by layer.

The development order was:

```
Database
↓

Models & Relationships
↓

Validation

↓

Business Logic (Service)

↓

Controller

↓

Views

↓

Reusable Components

↓

UI/UX Improvements

↓

Refactoring

↓

Polishing
```

Every layer has a single responsibility.

---

# Database Design

## Tables

### products

Stores the main product information.

Fields include:

- id
- category_id
- name
- slug
- sku
- description
- price
- sale_price
- stock
- status
- is_featured
- timestamps

---

### product_images

Stores multiple images for every product.

Fields:

- id
- product_id
- image
- timestamps

---

# Relationships

## Category

```
Category
    ↓
hasMany(Product)
```

---

## Product

```
Product
    ↓
belongsTo(Category)

Product
    ↓
hasMany(ProductImage)
```

---

## ProductImage

```
ProductImage
    ↓
belongsTo(Product)
```

---

# Why Multiple Image Table?

Instead of storing:

```
image1

image2

image3
```

inside the products table, a dedicated table was created.

Advantages:

- Unlimited images
- Better normalization
- Easier deletion
- Easier ordering
- Easier gallery management

---

# Architecture

The Product module follows:

```
Request
↓

Controller
↓

Service
↓

Model
↓

Database
```

The controller does not contain business logic.

All product-specific logic lives inside ProductService.

---

# ProductService Responsibilities

The service is responsible for:

- Creating products
- Updating products
- Generating slugs
- Uploading images
- Deleting products
- Deleting product images

The controller only delegates work.

Example:

```
Controller

↓

ProductService

↓

Product Model
```

---

# Slug Generation

Slug generation is shared across modules.

A reusable SlugService was created.

Example:

```
iPhone 17 Pro Max

↓

iphone-17-pro-max
```

This prevents duplicate slug logic across multiple modules.

---

# Validation

Two Form Requests were used.

## StoreProductRequest

Responsible for:

- Product validation
- Image validation
- Price validation
- SKU validation

---

## UpdateProductRequest

Responsible for:

- Updating validation
- Unique SKU handling
- Optional image upload

Keeping validation outside the controller makes controllers very clean.

---

# Views

The Product module contains:

```
products/

index.blade.php

create.blade.php

edit.blade.php

show.blade.php (optional)

_form.blade.php
```

---

# Why _form.blade.php?

Create and Edit pages share almost identical fields.

Instead of duplicating code:

```
Create Form

Edit Form
```

A reusable partial was created.

Benefits:

- Single source of truth
- Easier maintenance
- Less duplication
- Cleaner views

---

# Reusable Components Used

The Product module heavily relies on reusable Blade components.

Components used:

- x-admin.page
- x-admin.card
- x-admin.button
- x-admin.input
- x-admin.select
- x-admin.textarea
- x-admin.checkbox
- x-admin.image-upload
- x-admin.badge
- x-admin.table
- x-admin.search
- x-admin.form-actions

This keeps every page short and readable.

---

# Image Upload

The image upload component was upgraded.

Supports:

- Single image
- Multiple images
- Live preview
- Drag & Drop
- Help text

Categories use:

```
image
```

Products use:

```
images[]
```

The same component supports both.

---

# Product Gallery

The edit page displays existing images.

Each image has:

- Preview
- Delete button

Images can be removed individually.

---

# Image Deletion Protection

A product is not allowed to lose its final image.

Logic:

```
if images <= 1

↓

Reject deletion
```

This prevents products without images.

---

# Searching

Products can be searched by:

- Product Name
- SKU

Search automatically triggers after typing stops.

No search button is required.

---

# Filtering

The Product module supports multiple filters.

Filters include:

- Search
- Category
- Status
- Featured
- Stock

All filters work together.

Example:

```
Search

+

Category

+

Featured

+

Status

+

Stock
```

---

# Pagination

Pagination is used to avoid loading every product at once.

Benefits:

- Faster pages
- Better performance
- Better UX

---

# UI Improvements

Several improvements were added.

Price Display

Instead of

```
1000
```

Display

```
৳1200

৳999
```

Sale prices appear in green.

Original prices appear with strike-through.

---

Stock Badge

Instead of

```
3
```

Display

```
Low Stock (3)
```

Instead of

```
0
```

Display

```
Out of Stock
```

---

Featured Badge

Featured products receive a visual badge.

```
⭐ Featured
```

This makes featured products immediately visible.

---

# JavaScript

Dedicated admin JavaScript files were created.

```
admin/

delete-confirmation.js

filters.js

image-preview.js

sidebar.js
```

Each file has one responsibility.

---

# Route Structure

The module uses resource routes.

```
admin.products.*
```

Additional route:

```
Delete Product Image
```

---

# Design Decisions

Several important decisions were made during development.

## Service Layer

Business logic belongs inside services.

Not controllers.

---

## Form Requests

Validation belongs inside Form Requests.

Not controllers.

---

## Blade Components

Repeated UI belongs inside reusable components.

Not inside views.

---

## Partial Forms

Repeated form fields belong inside partials.

Not duplicated.

---

## Image Table

Images deserve their own table.

Not multiple image columns.

---

# Folder Structure

```
app/

Http/

Controllers/

Requests/

Models/

Services/

resources/

views/

admin/

products/

index.blade.php

create.blade.php

edit.blade.php

_form.blade.php

components/

admin/

js/

admin/
```

---

# Lessons Learned

This module introduced several Laravel concepts.

- One-to-Many Relationships
- Multiple File Upload
- Form Requests
- Service Layer
- Slug Generation
- Blade Components
- Partial Views
- Search
- Filtering
- Pagination
- SweetAlert Integration
- Better UI Architecture

---

# Final Result

The Product module now supports:

- ✅ Create Product
- ✅ Update Product
- ✅ Delete Product
- ✅ View Products
- ✅ Multiple Images
- ✅ Delete Individual Images
- ✅ Drag & Drop Upload
- ✅ Live Image Preview
- ✅ Product Search
- ✅ Product Filters
- ✅ Pagination
- ✅ Responsive Layout
- ✅ Service Layer
- ✅ Reusable Components
- ✅ Clean Architecture

---

# Future Improvements

Possible future enhancements:

- Product Details Page
- Primary Product Image
- Drag & Drop Image Sorting
- Bulk Delete
- Bulk Status Update
- Product Variants
- Inventory History
- Product Reviews
- Product Tags
- Soft Deletes

---

# Conclusion

The Product module demonstrates how to build a scalable CRUD module in Laravel.

Instead of focusing only on making CRUD work, the module was designed around clean architecture, reusable components, separation of concerns, and maintainability.

This approach makes future modules such as Brands, Orders, Customers, Coupons, and Reviews easier to implement because the same architecture can be reused throughout the project.