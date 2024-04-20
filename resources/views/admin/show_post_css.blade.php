<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
    integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<style>
    /* Existing styles */
    .post_title {
        font-size: 30px;
        font-weight: bold;
        text-align: center;
        color: #fff;
        padding: 30px;
    }

    .div_center {
        display: inline-block;
        justify-content: center;
        align-items: center;
        text-align: center;
        padding: 25px;
        width: fit-content;
    }

    /* New styles for the table */
    table {
        width: 100%;
        /* Adjust the width of the table as needed */
    }

    table,
    th,
    td {
        /* border: 1px solid #ddd; */
        /* Add border to the table and cells */
        white-space: nowrap;
        /* Prevent line wrapping */
        overflow: hidden;
        /* Hide overflow content */
        padding: 8px;
        /* Add padding to table headers and cells */

    }

    /* Add text alignment rules */
    th,
    td {
        text-align: left;
        /* Default alignment */
    }

    /* Center the last column's text */
    table th:last-child,
    table td:last-child {
        text-align: center;
        /* Center-align the last column */
    }

    /* Decrease the width of the "Description" column */
    table th:nth-child(3),
    table td:nth-child(3) {
        max-width: 200px;
        /* Set a maximum width for the description column */
    }

    /* Ensure buttons in "Actions" column and "Publish / Unpublish" column are in one line and the same size */
    table td:nth-child(11),
    table td:nth-child(12) {
        display: flex;
        /* Align buttons in one line */
        justify-content: center;
        /* Center buttons in the cell */
        align-items: center;
    }

    table td:nth-child(11) .btn,
    table td:nth-child(12) .btn {
        display: inline-block;
        margin: 0 5px;
        /* Add margin between buttons */
        width: 100px;
        /* Set the width of the buttons */
    }

    /* Optional: Add a hover effect for better user experience */
    tr:hover {
        background-color: gray;
        color: #fff;
        /* Change the background color on hover */
    }
</style>
