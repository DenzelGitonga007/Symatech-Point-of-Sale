<!-- The navigation -->
<nav class="active" id="sidebar">
    <ul class="list-unstyled lead">
        <!-- Navigation links -->

        <!-- Home -->
        <li class="">
            <a href=""> <i class=" fa fa-home"></i> Home </a>
        </li>

        <!-- Products -->
        <li>
            <a href="">Products</a>
        </li>

        <!-- Orders -->
        <li>
            <a href="{{ route('orders.index') }}"> <i class="fa fa-box"></i> Orders</a>
        </li>

        <!-- Transactions -->
        <li>
            <a href="">Transactions</a>
        </li>
    </ul>
</nav>

<!-- Styling -->
<style>

    /* The border line at the bottom */
    #sidebar ul.lead {
        border-bottom: 1px solid #47748b;
        width: fit-content;
    }

    /* The links */
    #sidebar ul li a:link {
        text-decoration: none; /* Remove the undeline */
    }
    
    /* On hover */
    #sidebar ul li a:hover {
        color: #fff;
        background-color: #008888;
        text-decoration: none;
    }

    /* The links themselves */
    #sidebar ul li a {
        padding: 10px;
        font-size: 1.1em;
        display: block;
        width: 30vh;
        color: #008888;
    }

    /* Icons */
    #sidebar ul.lead a i {

        margin-right: 10px;
    }

    #sidebar ul li.active>a, 
    a[aria-expanded="true"]{
        
        color: #fff;
        background-color: #008888;
    }

</style>
