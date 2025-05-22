import { setIsAdd } from "@/components/store/storeAction";
import { StoreContext } from "@/components/store/storeContext";
import React, { Children } from "react";

const ModalWrapper = ({ children }) => {
  const { dispatch } = React.useContext(StoreContext);

  const handleClose = () => {
    dispatch(setIsAdd(false));
  };
  return (
    <>
      <div className="modal fixed h-screen w-full top-0 left-0 z-50">
        <div
          className="backdrop w-full h-full bg-black bg-opacity-50 "
          onClick={handleClose}
        ></div>
        {children}
      </div>
    </>
  );
};

export default ModalWrapper;
