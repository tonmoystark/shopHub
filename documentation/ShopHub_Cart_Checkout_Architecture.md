# ShopHub Documentation

# Cart & Checkout Architecture

## 1. Goal

The checkout module converts a customer's shopping cart into a permanent
order.

The process must:

-   Validate customer information.
-   Ensure stock is available.
-   Create an order.
-   Create order items.
-   Decrease product stock.
-   Clear the cart.
-   Redirect to a success page.

Everything should happen as **one atomic transaction** so the database
never ends up in an inconsistent state.

------------------------------------------------------------------------

## 2. Overall Architecture

### Cart Flow

``` text
Customer
    │
    ▼
Product Page
    │
    ▼
CartController
    │
    ▼
CartService
    │
    ▼
Session
```

### Checkout Flow

``` text
Checkout Form
        │
        ▼
StoreCheckoutRequest
        │
        ▼
CheckoutController
        │
        ▼
CheckoutService
        │
        ├── OrderNumberService
        ├── ProductService
        ├── CartService
        ▼
Database
```

------------------------------------------------------------------------

## 3. Why We Used Services

Business logic lives inside services, not controllers.

Benefits:

-   Thin controllers
-   Reusable business logic
-   Easier testing
-   Better maintainability

------------------------------------------------------------------------

## 4. CartService Responsibilities

-   Add products
-   Update quantities
-   Remove products
-   Clear cart
-   Validate stock
-   Calculate totals
-   Return cart summary

CartService manages only the shopping cart.

------------------------------------------------------------------------

## 5. CheckoutService Responsibilities

``` text
Receive Validated Data
        ↓
Check Cart
        ↓
Generate Order Number
        ↓
Create Order
        ↓
Load Purchased Products
        ↓
Create Order Items
        ↓
Decrease Stock
        ↓
Clear Cart
        ↓
Return Order
```

CheckoutService contains business logic only.

------------------------------------------------------------------------

## 6. Database Transactions

Checkout is wrapped in `DB::transaction()`.

Either:

-   everything succeeds, or
-   everything rolls back.

This keeps order data consistent.

------------------------------------------------------------------------

## 7. Order Item Snapshot

Each order item stores:

-   product_name
-   product_sku
-   product_price
-   quantity
-   subtotal

This preserves historical order information even if products change
later.

------------------------------------------------------------------------

## 8. Guest Checkout

`user_id` is nullable.

-   Guest checkout → `user_id = null`
-   Logged-in checkout → `user_id = user's id`

No database redesign is needed later.

------------------------------------------------------------------------

## 9. Enums

The project uses:

-   OrderStatus
-   PaymentStatus
-   PaymentMethod

Benefits:

-   Type safety
-   Autocomplete
-   Fewer typos

------------------------------------------------------------------------

## 10. Stock Management

Stock reduction is handled by ProductService, not CheckoutService.

This centralizes stock logic for future features such as refunds and
cancellations.

------------------------------------------------------------------------

## 11. Efficient Product Loading

Instead of loading every product:

``` php
Product::all();
```

we load only purchased products:

``` php
Product::whereIn(...)
```

This scales much better.

------------------------------------------------------------------------

## 12. Reusable UI Components

Reusable components include:

-   Button
-   Input
-   Textarea
-   Select
-   Label
-   Checkbox
-   Radio
-   Card
-   Badge
-   Price
-   Stock Badge
-   Quantity Selector
-   Empty State
-   Page Header

------------------------------------------------------------------------

## 13. Checkout Flow

``` text
Customer
    ↓
Browse Products
    ↓
View Product
    ↓
Add To Cart
    ↓
Session Cart
    ↓
Checkout Form
    ↓
StoreCheckoutRequest
    ↓
CheckoutController
    ↓
CheckoutService
        ├── Create Order
        ├── Create Order Items
        ├── Reduce Stock
        ├── Clear Cart
    ↓
Success Page
```

------------------------------------------------------------------------

## 14. Design Principles

-   Single Responsibility Principle
-   Thin Controllers
-   Service Layer
-   Reusable Components
-   Database Transactions
-   Scalable Architecture

------------------------------------------------------------------------

## Conclusion

The checkout architecture is designed to be maintainable, scalable, and
ready for future features such as:

-   Admin Order Management
-   Customer Order History
-   SSLCOMMERZ
-   Stripe
-   Coupons
-   Refunds
-   PDF Invoices
