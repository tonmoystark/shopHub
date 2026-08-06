<div class="mb-10 grid gap-6 md:grid-cols-2 xl:grid-cols-4">

    <x-account.stat-card
        title="Total Orders"
        :value="$totalOrders"
    />

    <x-account.stat-card
        title="Pending Orders"
        :value="$pendingOrders"
        color="text-yellow-600"
    />

    <x-account.stat-card
        title="Delivered Orders"
        :value="$completedOrders"
        color="text-green-600"
    />

    <x-account.stat-card
        title="Total Spent"
        :value="'৳' . number_format($totalSpent, 2)"
        color="text-blue-600"
    />

</div>