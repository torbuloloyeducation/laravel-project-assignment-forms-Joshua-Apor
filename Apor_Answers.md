Activity 2:

Task 1: Understand the Flow:

The user enters an email into the form and submits it using a POST request to /formtest. The application retrieves the input using request('email') and stores it in the session using session()->push(). After storing the email, the app redirects back to /formtest, triggering a GET request. During this request, the stored emails are retrieved from the session and passed to the formtest view. The page then reloads and displays all saved emails in a list.

Reflection Questions:
1.What is the difference between GET and POST?
    GET and POST are HTTP methods; GET sends data in the URL, while POST sends it hidden in the request body.

2.Why do we use @csrf in forms?
    @csrf is used in forms to protect against Cross-Site Request Forgery attacks by ensuring that the form submission comes from a trusted source.

3.What is session used for in this activity?
    Sessions are used to store temporary user data on the server, such as login status or form inputs, so that information can persist across different pages during a user’s visit.

4.What happens if session is cleared?
    It means all stored user data is lost, which may log the user out and remove any temporary information.