const show_pass = document.querySelectorAll(".show_pass");
const pass_field = document.querySelectorAll(".pass_field");

show_pass.forEach((item, index) => {
  item.addEventListener("click", () => {
    if (pass_field[index].type == "password") {
      pass_field[index].type = "text";
    } else {
      pass_field[index].type = "password";
    }
  });
});
