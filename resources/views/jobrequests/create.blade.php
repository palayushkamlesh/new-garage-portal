<html>
    <style>
        html, body {
        min-height: 100%;
        padding: 0;
        margin: 0;
        font-family: Roboto, Arial, sans-serif;
        font-size: 14px;
        color: #666;
        }
        h1 {
        margin: 0 0 20px;
        font-weight: 400;
        color: #1c87c9;
        }
        p {
        margin: 0 0 5px;
        }
        .main-block {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        background: #1c87c9;
        }
        form {
        padding: 25px;
        margin: 25px;
        box-shadow: 0 2px 5px #f5f5f5; 
        background: #f5f5f5; 
        }
        .fas {
        margin: 25px 10px 0;
        font-size: 72px;
        color: #fff;
        }
        .fa-dog, .fa-paw, .fa-heart {
        transform: rotate(-10deg);
        }
        input, textarea, select {
        width: calc(100% - 18px);
        padding: 8px;
        margin-bottom: 20px;
        border: 1px solid #1c87c9;
        outline: none;
        }
        input::placeholder {
        color: #666;
        }
        button {
        width: 100%;
        padding: 10px;
        border: none;
        background: #1c87c9; 
        font-size: 16px;
        font-weight: 400;
        color: #fff;
        }
        button:hover {
        background: #2371a0;
        } 
        @media (min-width: 568px) {
        .main-block {
        flex-direction: row;
        }
        .left-part, form {
        width: 50%;
        }
        .fa-dog {
        margin-top: 0;
        margin-left: 20%;
        }
        .fa-paw {
        margin-top: -10%;
        margin-left: 65%;
        }
        .fa-heart {
        margin-top: 2%;
        margin-left: 28%;
        }
        }
        </style>
@if(Auth::check())
    <!-- Display jobrequest Request Form -->
    <div class="main-block">
        <div class="left-part">
            <i class="fas fa-dog"></i>
            <i class="fas fa-paw"></i>
            <i class="fas fa-heart"></i>
        </div>
        <form action="{{ route('jobrequests-store') }}" method="POST">
            @csrf
            <h1>Job Request Form</h1>
            <div class="info">
                <input type="text" name="name" placeholder="Full Name" required>
                <input type="text" name="vehicle_model" placeholder="vehicle_Model" required>
                <input type="text" name="vehicle_number" placeholder="vehicle_number" required>
                <input type="text" name="issue_description" placeholder="issue_description" required>
                <input type="date" name="preferred_date" placeholder="preferred_date" required>
                <p>status</p>
                <select name="family_status" required>
                    <option value="In Progress">In Progress</option>
                    <option value="Pending">Pending</option>
                    <option value="Completed">Completed</option>
                </select>
            </div>
            <button type="submit">Submit</button>
        </form>
    </div>
@else
    <p>You must be logged in to submit an adoption request. <a href="{{ route('login') }}">Login</a></p>
@endif
