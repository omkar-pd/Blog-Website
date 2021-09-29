const showPass = document.querySelectorAll(".show_pass");
const passField = document.querySelectorAll(".pass_field");

showPass.forEach((item, index) => {
  item.addEventListener("click", () => {
    if (passField[index].type == "password") {
      passField[index].type = "text";
    } else {
      passField[index].type = "password";
    }
  });
});
