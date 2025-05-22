import React from "react";

const Pills = ({ text }) => {
  return (
    <span
      className={
        text === "Active"
          ? "text-[8px] bg-success px-2 py-0.5 rounded-full w-[50px] border border-success text-success text-center bg-opacity-20"
          : "text-[8px] bg-gurey px-2 py-0.5 rounded-full w-[50px] border border-body text-white text-center bg-opacity-20"
      }
    >
      {text}
    </span>
  );
};

export default Pills;
