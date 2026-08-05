# ShopHub Documentation

# Module: Order Management (Admin)

---

# Overview

The Order Management module allows administrators to manage customer orders after checkout. It provides a centralized place to:

* View all orders
* View order details
* Update order status
* Update payment status
* Search and filter orders
* Enforce valid order status transitions

This module was designed using the same architecture as the Product module to keep the entire project consistent.

---

# Architecture

The module follows the following flow:

```text
Route
    ↓
OrderController
    ↓
OrderService
    ↓
Order Model (Scopes)
    ↓
Database
```

Each layer has a single responsibility.

---

# Thought Process

The first goal was **not** to build a CRUD.

The goal was to build a workflow that resembles a real e-commerce application.

Instead of allowing controllers to contain business logic, we moved all business logic into dedicated services.

The controller became responsible only for:

* Receiving the request
* Calling the service
* Returning the response

---

# Order Model

The Order model is responsible for:

* Defining relationships
* Casting enums
* Providing reusable query scopes

Relationships:

* User
* Order Items

Query Scopes:

* withRelations()
* search()
* orderStatus()
* paymentStatus()

Using scopes keeps query logic out of controllers and services.

---

# Enum Driven Design

Instead of storing plain strings everywhere, the module uses enums.

Enums used:

* OrderStatus
* PaymentStatus
* PaymentMethod

Each enum provides:

```php
label()

options()
```

Benefits:

* Consistent labels
* Centralized values
* Cleaner Blade templates
* Easier dropdown generation

Instead of:

```blade
{{ ucfirst($order->order_status->value) }}
```

we now use:

```blade
{{ $order->order_status->label() }}
```

---

# Service Layer

Business logic lives inside OrderService.

Responsibilities:

* Retrieve filtered orders
* Load order details
* Update order status
* Update payment status

Controllers never update the database directly.

Instead:

```text
Controller
    ↓
Service
    ↓
Model
```

This keeps controllers small and maintainable.

---

# Search & Filtering

Search supports:

* Order Number
* Customer Name
* Customer Email

Filtering supports:

* Order Status
* Payment Status

Implementation:

```text
Request
    ↓
Controller
    ↓
OrderService
    ↓
Order Model Scopes
```

This is identical to the Product module, providing consistency across the project.

---

# Reusable Components

The admin interface was built using reusable Blade components.

Components used:

* x-admin.page
* x-admin.card
* x-admin.table
* x-admin.search
* x-admin.select
* x-admin.button
* x-admin.badge
* x-ui.label

Using reusable components reduces duplicated HTML and keeps the UI consistent.

---

# Order Details Page

The order details page is divided into independent cards.

Customer Information

Displays:

* Name
* Email
* Phone
* Address
* City

---

Order Items

Displays:

* Product
* SKU
* Quantity
* Price
* Line Total

---

Order Summary

Displays:

* Subtotal
* Discount
* Shipping
* Tax
* Grand Total

This card intentionally has its own layout because the admin requires more information than the customer checkout summary.

---

Order Actions

Allows the administrator to:

* Update Order Status
* Update Payment Status
* Return to Orders

The page separates viewing data from performing actions.

---

# Status Workflow

A real e-commerce application should not allow arbitrary status changes.

Instead of allowing:

```text
Pending
↓

Delivered
```

the system enforces a workflow.

Allowed transitions:

```text
Pending
    ↓
Confirmed
    ↓
Processing
    ↓
Shipped
    ↓
Delivered
```

Alternative paths:

```text
Pending
↓

Cancelled
```

```text
Delivered
↓

Refunded
```

These rules are implemented inside the OrderStatus enum.

---

# Why Put Workflow Inside the Enum?

The enum owns the lifecycle of an order.

Instead of the service knowing every rule, it simply asks:

```php
$currentStatus->canTransitionTo($newStatus)
```

Benefits:

* Single source of truth
* Cleaner services
* Easier maintenance
* Easier testing

---

# Validation

Validation happens in two layers.

Layer 1

Form Request

Ensures:

* Required fields
* Valid enum values

Layer 2

OrderService

Ensures:

* Business rules
* Valid status transitions

This prevents invalid updates even if someone bypasses the UI.

---

# Error Handling

Business rule violations throw:

```php
DomainException
```

The controller catches the exception and displays a friendly flash message.

This keeps business logic out of the controller.

---

# Design Decisions

## Why Services?

Services separate business logic from HTTP logic.

Controllers remain thin.

Business rules stay reusable.

---

## Why Scopes?

Scopes avoid duplicated query logic.

Instead of repeating:

```php
->where(...)
```

throughout the project, reusable scopes keep queries readable.

---

## Why Enums?

Enums eliminate magic strings.

Instead of:

```php
'pending'
```

everywhere, the project uses:

```php
OrderStatus::Pending
```

This improves type safety and reduces mistakes.

---

## Why Reusable Components?

Instead of writing HTML repeatedly, components provide:

* Consistent UI
* Easier maintenance
* Faster development

---

# Lessons Learned

This module demonstrates several important Laravel concepts.

Models

* Relationships
* Query Scopes
* Attribute Casting

Services

* Business Logic
* Separation of Concerns

Enums

* State Management
* Labels
* Options
* Workflow Rules

Blade Components

* Reusability
* Clean Views

Controllers

* Thin Controllers
* Dependency Injection

Validation

* Form Requests
* Service Validation

Exceptions

* DomainException
* Graceful Error Handling

---

# Future Improvements

The module is feature-complete but can be enhanced later.

Possible improvements:

* Timeline of status changes
* Status history table
* Email notifications
* PDF invoice generation
* Export orders
* Refund workflow
* Automatic payment synchronization
* Event dispatching
* Queue-based email notifications

---

# Final Thoughts

The Order Management module follows the same architectural principles used throughout ShopHub:

* Thin Controllers
* Rich Services
* Reusable Components
* Enum-Driven Design
* Query Scopes
* Business Logic Encapsulation

This consistency makes the project easier to maintain, extend, and scale.

The module now provides a solid production-ready foundation for the next phase of the application: the Customer Account and Order Tracking system.
