# ShopHub Documentation

# Module 03 — Cart System

---

# Overview

The Cart System is the bridge between browsing products and placing an order.

The objective of this module was to build a clean, reusable, and scalable shopping cart that works for guest users while following a layered architecture.

Instead of storing cart data directly in controllers or the database, the application uses a dedicated `CartService` with session storage.

Architecture:

```text
Route
    ↓
Controller
    ↓
CartService
    ↓
Session
```

This keeps the cart independent from the database until the customer proceeds to checkout.

---

# Goals

The Cart module was designed with the following goals:

* Support guest shopping.
* Keep business logic outside controllers.
* Store cart data in the session.
* Prevent invalid quantities.
* Validate stock before adding products.
* Build reusable UI components.
* Prepare for Checkout and Order creation.

---

# Why Session Instead of Database?

The application stores cart data inside the session.

Reasons:

* Users can shop without logging in.
* No unnecessary database writes.
* Faster operations.
* Easier to clear the cart.
* Simple transition into Checkout.

The database is only used when the customer places an order.

---

# Architecture

```text
Product Page

↓

Add To Cart

↓

CartController

↓

CartService

↓

Session
```

The controller never manipulates the session directly.

All cart operations go through the service.

---

# CartService Responsibilities

The CartService became the single source of truth for cart operations.

Responsibilities:

* Add product
* Update quantity
* Remove product
* Clear cart
* Retrieve cart items
* Calculate subtotal
* Calculate total
* Validate stock

Keeping everything inside the service makes future changes much easier.

---

# Cart Data Structure

Each cart item contains:

```text
product_id
name
sku
image
unit_price
quantity
stock
line_total
```

The cart is stored as an associative array inside the session.

Example:

```text
cart
│
├── Product 1
├── Product 2
└── Product 3
```

Each product is indexed by its product ID, making updates and removals efficient.

---

# Controller Responsibilities

The CartController has only one responsibility:

Receive HTTP requests and delegate work to the CartService.

Methods:

* index()
* store()
* update()
* destroy()
* clear()

The controller never contains business logic.

---

# Validation

Validation happens in two layers.

## Layer 1 — Form Requests

Form requests validate:

* Required quantity
* Integer value
* Minimum quantity
* Maximum quantity (current stock)

This prevents invalid HTTP requests.

---

## Layer 2 — CartService

The service validates stock again.

Example:

```text
Requested Quantity

↓

Compare With Stock

↓

Valid?

↓

Yes → Update Cart

No → Throw Exception
```

This guarantees business rules remain protected even if frontend validation is bypassed.

---

# Exception Handling

The CartService throws a `DomainException` whenever the requested quantity exceeds available stock.

Instead of crashing the application, the controller catches the exception and returns a user-friendly error message.

Benefits:

* No server error pages.
* Better user experience.
* Business rules remain enforced.

---

# Quantity Selector Component

A reusable Blade component was created.

Features:

* Increase quantity
* Decrease quantity
* Minimum limit
* Maximum limit
* Reusable across multiple pages

Used in:

* Product Details
* Cart Page

Future:

* Checkout
* Quick Cart
* Wishlist (optional)

---

# JavaScript Enhancements

The cart uses JavaScript to improve user experience.

Features:

* Auto-submit quantity changes.
* Prevent quantity below minimum.
* Prevent quantity above stock.
* Display inline stock warning.
* Delay submission to reduce unnecessary requests.

This provides instant feedback before the request reaches the server.

---

# Stock Protection

The cart protects inventory in multiple ways.

```text
User Clicks +

↓

JavaScript

↓

Max Reached?

↓

Yes

↓

Stop Counter

↓

Show Message

↓

No Request Sent
```

Even if JavaScript is bypassed:

```text
Request

↓

Form Request Validation

↓

CartService Validation

↓

Reject Invalid Quantity
```

This layered approach prevents overselling.

---

# Cart Page

The Cart page displays:

* Product Image
* Product Name
* SKU
* Unit Price
* Quantity Selector
* Line Total
* Remove Button

Summary Section:

* Subtotal
* Total
* Checkout Button

The page updates automatically whenever quantities change.

---

# Reusable UI Components

Several reusable components were introduced:

* quantity-selector
* order-summary
* button
* card
* input

These components reduce duplicated markup and keep the UI consistent.

---

# Design Decisions

## Thin Controllers

Controllers coordinate requests only.

---

## Service Layer

Business rules belong inside the service.

---

## Session-Based Cart

Supports guest checkout and reduces database usage.

---

## Reusable Components

UI elements were designed once and reused.

---

## Defensive Programming

Validation exists in both the frontend and backend.

No single layer is trusted completely.

---

# Folder Structure

```text
app/

Http/
├── Controllers/
│   └── CartController.php
│
├── Requests/
│   └── Cart/
│       ├── StoreCartRequest.php
│       └── UpdateCartRequest.php
│
Services/
└── CartService.php

resources/

views/
├── frontend/
│   └── cart/
│
└── components/
    └── ui/
        ├── quantity-selector.blade.php
        └── order-summary.blade.php

resources/js/
└── cart-quantity.js
```

---

# Lessons Learned

During this module, several architectural principles became clear:

* Services should own business logic.
* Controllers should stay small.
* Validation should exist in multiple layers.
* JavaScript improves UX but never replaces backend validation.
* Session storage is sufficient until Checkout.
* Reusable components significantly reduce repeated code.

---

# Current Status

Completed:

* Session-based Cart
* CartService
* CartController
* Form Requests
* Quantity Validation
* Auto Quantity Update
* Remove Item
* Clear Cart
* Order Summary Component
* Quantity Selector
* Stock Protection

Next Module:

* Checkout
* Order Creation
* Order Items
* Reduce Product Stock
* Clear Session Cart
* Payment Integration

---

# Conclusion

The Cart System transforms ShopHub from a product catalog into a functional shopping experience.

By combining a dedicated service layer, session storage, reusable UI components, and layered validation, the cart is secure, maintainable, and ready for the Checkout module. The design prioritizes both user experience and clean architecture, ensuring future features such as payments, coupons, and shipping can be added without major refactoring.
