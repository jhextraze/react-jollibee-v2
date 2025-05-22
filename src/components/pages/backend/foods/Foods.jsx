import { setIsAdd } from "@/components/store/storeAction";
import { StoreContext } from "@/components/store/storeContext";
import { Plus } from "lucide-react";
import React from "react";
import Footer from "../partials/Footer";
import Header from "../partials/Header";
import Searchbar from "../partials/Searchbar";
import SideNavigation from "../partials/SideNavigation";
import FoodsTable from "./FoodsTable";
import ModalAddFoods from "./ModalAddFoods";

const Foods = () => {
  const { dispatch, store } = React.useContext(StoreContext);
  const handleAdd = () => {
    dispatch(setIsAdd(true));
  };
  return (
    <>
      <section className="layout-main ">
        <div className="layout-division ">
          <SideNavigation menu="foods" />
          <main>
            <Header title="Foods" subtitle="Manage List of Foods" />
            <div className="p-8">
              <div className="flex justify-between items-center">
                <Searchbar />
                <button className="btn btn-add" onClick={handleAdd}>
                  <Plus size={16} /> Add New
                </button>
              </div>
              <FoodsTable />
            </div>
            <Footer />
          </main>
        </div>
      </section>
      {store.isAdd && <ModalAddFoods setIsAdd={setIsAdd} />}
    </>
  );
};

export default Foods;
