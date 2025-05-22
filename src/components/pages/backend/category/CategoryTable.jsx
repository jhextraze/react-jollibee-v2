import Status from "@/components/partials/Status";
import ModalArchive from "@/components/partials/modal/ModalArchive";
import ModalDelete from "@/components/partials/modal/ModalDelete";
import ModalRestore from "@/components/partials/modal/ModalRestore";
import {
  setIsAdd,
  setIsArchive,
  setIsDelete,
  setIsRestore,
} from "@/components/store/storeAction";
import { StoreContext } from "@/components/store/storeContext";
import { Archive, ArchiveRestore, FilePenLine, Trash2 } from "lucide-react";
import React from "react";
import LoadMore from "../partials/LoadMore";
import ModalConfirm from "../partials/modals/ModalConfirm";
import { categData } from "./CategoryData";
import useQueryData from "@/components/custom-hook/useQueryData";
const CategoryTable = ({ setIsCategoryEdit }) => {
  const { store, dispatch } = React.useContext(StoreContext);
  const [id, setIsId] = React.useState("")
  let counter = 1;

  const handleEdit = (item) => {
    dispatch(setIsAdd(true));
    setIsCategoryEdit(item)
  };

  const handleArchive = (item) => {
    dispatch(setIsArchive(true));
    setIsId(item.food_category_aid);
  };

  const handleRestore = (item) => {
    dispatch(setIsRestore(true));
    setIsId(item.food_category_aid);
  };

  const handleDelete = (item) => {
    dispatch(setIsDelete(true));
    setIsId(item.food_category_aid);
  };

  const {
    isFetching,
    error,
    data: result,
    status,
  } = useQueryData(
      `/v2/category`, //endpoint
      "get", //method
      "category" //key
  );
  
  return (
    <>
      <div className="p-4 bg-gurey rounded-md mt-10 border border-line relative">
        <div className="table-wrapper custom-scroll">
          <table>
            <thead>
              <tr>
                <th>#</th>
                <th>Status</th>
                <th className="w-[50%]">Title</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              {result?.count > 0 &&
                result.data.map((item, key) => (
                <tr key={key}>
                  <td>{counter++}.</td>
                  <td>
                    {item.food_category_is_active === 1 ? (
                      <Status text="Active" />
                    ) : (
                      <Status text="Inactive" />
                    )}
                  </td>
                  <td>{item.food_category_name}</td>
                  <td>
                    <ul className="table-action ">
                      {item.food_category_is_active === 1 ? (
                        <>
                          <li>
                            <button className="tooltip" data-tooltip="Edit" onClick={() => handleEdit(item)}>
                              <FilePenLine />
                            </button>
                          </li>
                          <li>
                            <button className="tooltip" data-tooltip="Archive" onClick={() => handleArchive(item)}>
                              <Archive />
                            </button>
                          </li>
                        </>
                      ) : (
                        <>
                          <li>
                            <button className="tooltip" data-tooltip="Restore" onClick={() => handleRestore(item)}>
                              <ArchiveRestore />
                            </button>
                          </li>
                          <li>
                            <button className="tooltip" data-tooltip="Delete" onClick={() => handleDelete(item)}>
                              <Trash2 />
                            </button>
                          </li>
                        </>
                      )}
                    </ul>
                  </td>
                </tr>
              ))}
            </tbody>
          </table>

          <LoadMore />
        </div>
      </div>
      {store.isDelete && (
        <ModalDelete
          setIsDelete={setIsDelete}
          mysqlApiDelete={`/v2/category/${id}`}
          queryKey={"category"}
        />
      )}
      {store.isArchive && (
        <ModalArchive
          setIsArchive={setIsArchive}
          mysqlEndpoint={`/v2/category/active/${id}`}
          queryKey={"category"}
        />
      )}
      {store.isRestore && (
        <ModalRestore
          setIsRestore={setIsRestore}
          mysqlEndpoint={`/v2/category/active/${id}`}
          queryKey={"category"}
        />
      )}
      {store.isConfirm && <ModalConfirm />}
      {store.isView && <ModalViewMovie movieInfo={movieInfo} />}
    </>
  );
};

export default CategoryTable;
