<form action="#" method="post">
    <fieldset>
        <legend>Form 1</legend>
        
        <label>Order by:</label> <br>  
        <br>Ascending:<input type="radio" name="order" value="ASC" /> <br>
        Descending:<input type="radio" name="order" value="DESC" /> <br> <br>

        <label>Sort by Column:</label>  
        <select name="column">
            <option value="id">ID</option>
            <option value="corp" selected>Corporation</option>
            <option value="incorp_dt" selected>Incorp Date Time</option>
            <option value="email" selected>Email</option>
            <option value="zipcode" selected>Zipcode</option>
            <option value="owner" selected>Owner</option>
            <option value="phone" selected>Phone</option>
        </select>
        <input type="hidden" name="action" value="submit1" />
        <input type="submit" value="Submit" />
    </fieldset>    
</form>