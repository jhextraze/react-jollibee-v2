import Status from "@/components/partials/Status";
import { StoreContext } from "@/components/store/storeContext";
import { Archive, ArchiveRestore, FilePenLine, Trash2 } from "lucide-react";
import React from "react";
import LoadMore from "../partials/LoadMore";
import { foodData } from "./FoodData";
import useQueryData from "@/components/custom-hook/useQueryData";
const FoodsTable = ({ itemEdit, setItemEdit }) => {
  const { store, dispatch } = React.useContext(StoreContext);

  let counter = 1;

  const {
    isFetching,
    error,
    data: result,
    status,
  } = useQueryData(
      `/v2/foods`, //endpoint
      "get", //method
      "food" //key
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
                <th className="">Price</th>
                <th className="">Category</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              {result?.count > 0 &&
                result.data.map((item, key) => (
                <tr key={key}>
                  <td>{counter++}.</td>
                  <td>
                    {item.food_item_is_active === 1 ? (
                      <Status text="Active" />
                    ) : (
                      <Status text="Inactive" />
                    )}
                  </td>
                  <td>{item.food_item_name}</td>
                  <td>{item.food_item_price}</td>
                  <td>{item.food_item_food_category_id}</td>
                  <td>
                    <ul className="table-action ">
                      {item.food_item_is_active === 1 ? (
                        <>
                          <li>
                            <button className="tooltip" data-tooltip="Edit">
                              <FilePenLine />
                            </button>
                          </li>
                          <li>
                            <button className="tooltip" data-tooltip="Archive">
                              <Archive />
                            </button>
                          </li>
                        </>
                      ) : (
                        <>
                          <li>
                            <button className="tooltip" data-tooltip="Restore">
                              <ArchiveRestore />
                            </button>
                          </li>
                          <li>
                            <button className="tooltip" data-tooltip="Delete">
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
    </>
  );
};

export default FoodsTable;
