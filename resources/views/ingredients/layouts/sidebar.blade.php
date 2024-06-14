<style>
    .sidebar {
        min-height: 100vh;
        width: 200px;
        position: relative;
        top: 0;
        left: 0;
        background-color: #f8f9fa;
    }
    .sidebar a {
        padding: 15px;
        text-decoration: none;
        font-size: 12px;
        color: #000;
        display: block;
    }
    .sidebar a:hover {
        background-color: #ddd;
    }
    .sidebar-item.active {
        color: blue;
    }
    .content {
        margin-left: 250px;
        padding: 20px;
    }
</style>

<div class="sidebar">
    <div class="m-3">
        <p style="font-size: 0.8rem; color: #808080;">Ingredients Actions</p>
    </div>
    <a href="/recipe" class="fw-bold d-flex align-items-center sidebar-item active">
        <div style="width: 17px;">
            <i class="fa-solid fa-house"></i>
        </div>
        Ingredients
    </a>
    <a href="{{ route ('ingredient.create') }}" class="fw-bold d-flex align-items-center sidebar-item">
        <div style="width: 17px;">
            <i class="fa-solid fa-plus"></i>
        </div>
        New
    </a>
    <a href="#new" class="fw-bold d-flex align-items-center sidebar-item">
        <div style="width: 17px;">
            <i class="fa-solid fa-layer-group"></i>
        </div>
        Categories
    </a>
</div>

<script>
    // JavaScript to handle active link
    document.addEventListener('DOMContentLoaded', (event) => {
    const sidebarItems = document.querySelectorAll('.sidebar-item');

    sidebarItems.forEach(item => {
        item.addEventListener('click', function() {
            // Remove active class from all items
            sidebarItems.forEach(i => i.classList.remove('active'));

            // Add active class to the clicked item
            this.classList.add('active');
        });
    });
});
    // console.log("dor");
</script>
