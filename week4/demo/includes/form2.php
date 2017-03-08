<form action="#" method="post">
    <fieldset>
        <legend>Form 2</legend>
        <label>Search: </label>
        <input name="search" type="search" placeholder="Search...." />
        
        <label>Search by Column:</label>  
        <select name="column">
            <option value="id">ID</option>
            <option value="corp" selected>Corporation</option>
            <option value="incorp_dt" selected>Incorp Date Time</option>
            <option value="email" selected>Email</option>
            <option value="zipcode" selected>Zipcode</option>
            <option value="owner" selected>Owner</option>
            <option value="phone" selected>Phone</option>
        </select>
    
         <input type="hidden" name="action" value="submit2" />
        <input type="submit" value="Submit" />
    </fieldset>            
</form>