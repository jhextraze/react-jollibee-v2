import { Moon, Settings, Sun } from "lucide-react";
import React from "react";
import { Link } from "react-router-dom";

const Header = ({ title = "", subtitle = "" }) => {
  const [avatarName, setIsAvatarName] = React.useState(false);
  const [isDark, setIsDark] = React.useState(
    localStorage.getItem("theme") === "dark" ? true : false
  );
  const [theme, setTheme] = React.useState(localStorage.getItem("theme"));

  const handleTheme = () => {
    setIsDark(!isDark);
    if (isDark) {
      document.querySelector("html").classList.remove("dark");
      localStorage.setItem("theme", "light");
    } else {
      document.querySelector("html").classList.add("dark");
      localStorage.setItem("theme", "dark");
    }
  };

  // const handleAvatarName = () => {
  //   setIsAvatarName(true);
  // };

  React.useEffect(() => {
    function setThemeColor() {
      const html = document.querySelector("html");
      html.setAttribute("class", "");
      html.classList.add(theme);
      setTheme(localStorage.getItem("theme"));
    }

    setThemeColor();
  }, [theme]);

  return (
    <>
      <header className="bg-gurey">
        <div className="flex justify-between items-center p-4">
          <div className="[&>*]:mb-0 ">
            <h4>{title}</h4>
            <p>{subtitle}</p>
          </div>

          <div className="flex items-center gap-6">
            <button
              className="h-[20px] w-[45px] bg-primary rounded-2xl border border-line px-[2px] hover:border-accent transition-all duration-200"
              onClick={handleTheme}
            >
              <span
                className={`${
                  isDark ? "" : "translate-x-6"
                } size-[16px] rounded-full bg-secondary grid place-content-center transition-all duration-500`}
              >
                {isDark ? (
                  <Sun size={14} stroke={"white"} />
                ) : (
                  <Moon size={14} stroke={"black"} />
                )}
              </span>
            </button>

            <button
              className="size-[30px] rounded-full bg-accent grid place-content-center text-white"
              onClick={() => setIsAvatarName(!avatarName)}
            >
              AG
            </button>
            {avatarName && (
              <>
                <div className="absolute bg-gurey right-6 top-14 p-2 rounded-md">
                  <p className="text-white text-sm">Ansbert Gregana</p>
                </div>
              </>
            )}
          </div>
        </div>
      </header>
    </>
  );
};

export default Header;
