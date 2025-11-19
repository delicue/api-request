// Fetch users from the API
function api(baseUri, queryParams = {}, { triggerElement, affectedElement, event } ){
    document.getElementById(triggerElement).addEventListener(event, async () => {
        const apiKey = document.getElementById(affectedElement).value;
        try {
            const response = await fetch(`/users?key=${encodeURIComponent(apiKey)}`, {
                "body": {
                    ""
                }
            });
            const data = await response.json();
            document.getElementById('users-data').textContent = JSON.stringify(data, null, 2);
        } catch (error) {
            console.error('Error fetching users:', error);
        }
    });
}

api('/users', {
    key: 
})                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 