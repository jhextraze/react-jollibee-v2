import { Plus } from "lucide-react";
import React from "react";
import SideNavigation from "../partials/SideNavigation";
import Header from "../partials/Header";
import Footer from "../partials/Footer";
import Searchbar from "../partials/Searchbar";
import CategoryTable from "./CategoryTable";
import { StoreContext } from "@/components/store/storeContext";
import { setIsAdd } from "@/components/store/storeAction";
import ModalAddAdversitement from "./ModalAddCategory";
import ToastSuccess from "../partials/ToastSuccess";
import ModalError from "../partials/modals/ModalError";
import ModalValidation from "../partials/modals/ModalValidation";
import ModalAddCategory from "./ModalAddCategory";

const Category = () => {
  const { store, dispatch } = React.useContext(StoreContext);

  const [isCategoryEdit, setIsCategoryEdit] = React.useState(null)
  const handleAdd = () => {
    dispatch(setIsAdd(true));
    setIsCategoryEdit(null)
  };
  return (
    <>
      <section className="layout-main ">
        <div className="layout-division ">
          <SideNavigation menu="category" />
          <main>
            <Header title="Category" subtitle="Manage Kiosk Category" />
            <div className="p-8">
              <div className="flex justify-between items-center">
                <Searchbar />
                <button className="btn btn-add" onClick={handleAdd}>
                  <Plus size={16} /> Add New
                </button>
              </div>
              <CategoryTable setIsCategoryEdit={setIsCategoryEdit}/>
            </div>
            <Footer />
          </main>
        </div>
      </section>
      {store.isAdd && <ModalAddCategory setIsAdd={setIsAdd} setIsCategoryEdit={setIsCategoryEdit} isCategoryEdit={isCategoryEdit} />}
    </>
  );
};

export default Category;
