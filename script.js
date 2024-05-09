document.addEventListener("DOMContentLoaded", function() {
    const loginForm = document.getElementById('loginForm');
    const attendanceForm = document.getElementById('attendanceForm');
    const message = document.getElementById('message');

    // Function to handle login form submission
    function handleLogin(event) {
        event.preventDefault();
        const formData = new FormData(loginForm);
        fetch('login.php', { method: 'POST', body: formData })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    showAttendanceForm();
                } else {
                    showMessage('Invalid credentials');
                }
            })
            .catch(error => {
                showMessage('An error occurred while processing your request');
                console.error('Error:', error);
            });
    }

    // Function to show attendance form
    function showAttendanceForm() {
        loginForm.style.display = 'none';
        attendanceForm.style.display = 'block';
    }

    // Function to handle marking attendance
    function markAttendance() {
        const courseId = document.getElementById('courseSelect').value;
        fetch('attendance.php', { method: 'POST', body: JSON.stringify({ courseId: courseId }) })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    showMessage('Attendance marked successfully');
                } else {
                    showMessage('Failed to mark attendance: ' + data.message);
                }
            })
            .catch(error => {
                showMessage('An error occurred while processing your request');
                console.error('Error:', error);
            });
    }

    // Function to display messages
    function showMessage(msg) {
        message.innerText = msg;
    }

    // Event listeners
    loginForm.addEventListener('submit', handleLogin);
    document.getElementById('markAttendanceBtn').addEventListener('click', markAttendance);
});
