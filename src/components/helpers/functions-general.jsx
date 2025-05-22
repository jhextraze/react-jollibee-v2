import React from "react";

const urlJollibeeLocal = "http://localhost/react-jollibee-v2";
export const imgPath =
  "http://localhost/react-vite/react-jollibee-v2/public/img";

// ONLINE DEV and LOCAL hris
export const devApiUrl = `${urlJollibeeLocal}/rest`;
export const devNavUrl = ""; //removed /v2
export const devBaseImgUrl = `${imgPath}`;
export const devBaseUrl = `${urlJollibeeLocal}`;

// dev key from thunder client
export const devKey =
  "$2a$12$47wDvbLInZif/PVS8B6P3.7WxyJvUpBzZAWCsnWJUKq3nrn4qgmeO";

// get focus on a button
export const GetFocus = (id) => {
  React.useEffect(() => {
    const obj = document.getElementById(id);
    obj.focus();
  }, []);
};
