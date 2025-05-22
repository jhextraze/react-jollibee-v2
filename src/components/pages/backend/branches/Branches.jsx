import { Plus } from "lucide-react";
import React from "react";
import SideNavigation from "../partials/SideNavigation";
import Header from "../partials/Header";
import Footer from "../partials/Footer";
import Searchbar from "../partials/Searchbar";
import BranchesTable from "./BranchesTable";
import { StoreContext } from "@/components/store/storeContext";
import { setIsAdd } from "@/components/store/storeAction";
import ModalAddAdversitement from "./ModalAddBranches";
import ToastSuccess from "../partials/ToastSuccess";
import ModalError from "../partials/modals/ModalError";
import ModalValidation from "../partials/modals/ModalValidation";
import ModalAddBranches from "./ModalAddBranches";

const Branches = () => {
  const { store, dispatch } = React.useContext(StoreContext);

  const [isBranchesEdit, setIsBranchesEdit] = React.useState(null)
  const handleAdd = () => {
    dispatch(setIsAdd(true));
    setIsBranchesEdit(null)
  };
  return (
    <>
      <section className="layout-main ">
        <div className="layout-division ">
          <SideNavigation menu="branches" />
          <main>
            <Header title="Branches" subtitle="Manage Kiosk Branches" />
            <div className="p-8">
              <div className="flex justify-between items-center">
                <Searchbar />
                <button className="btn btn-add" onClick={handleAdd}>
                  <Plus size={16} /> Add New
                </button>
              </div>
              <BranchesTable setIsBranchesEdit={setIsBranchesEdit}/>
            </div>
            <Footer />
          </main>
        </div>
      </section>
      {store.isAdd && <ModalAddBranches setIsAdd={setIsAdd} setIsBranchesEdit={setIsBranchesEdit} isBranchesEdit={isBranchesEdit} />}
    </>
  );
};

export default Branches;
