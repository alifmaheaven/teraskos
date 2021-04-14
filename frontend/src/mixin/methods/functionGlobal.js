var define = {
    today: function() {
        // const monthNames = ["January", "February", "March", "April", "May", "June",
        // "July", "August", "September", "October", "November", "December"];
        const dateObj = new Date();
        const month = dateObj.getMonth() + 1;
        const day = String(dateObj.getDate()).padStart(2, '0');
        const year = dateObj.getFullYear();
        const output = month  + '/'+ day  + '/' + year;
        return output
    },
}

export default define