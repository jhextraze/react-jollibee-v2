import { imgPath } from "@/components/helpers/functions-general";
import React from "react";
import { menus } from "../backend/menu-data";
import useQueryData from "@/components/custom-hook/useQueryData";

const MenuList = ({ category, cartData, setCartData, setIsSuccess }) => {
  const {
    isFetching,
    error,
    data: food,
    status,
  } = useQueryData(
    `/v2/food`, //endpoint
    "get", //method
    "food" //key
  );

  // const menuFilter = food.filter((item) => item.food_category_id === category);

  // const handleAdd = (item) => {
  //   const exist = cartData.find((food) => food.food_aid === item.food_aid);
  //   if (exist !== undefined) {
  //     setCartData(
  //       cartData.map((cart) =>
  //         cart.food_aid === item.food_aid
  //           ? { ...exist, quantity: exist.quantity + 1 }
  //           : cart
  //       )
  //     );
  //   } else {
  //     setCartData([...cartData, { ...item, quantity: 1 }]);
  //   }
  //   setIsSuccess(true);
  // };

  return (
    <div className="grid grid-cols-3 gap-4 p-4">
      {food?.count > 0 &&
        food.data.map((item, key) => (
          <button key={key} onClick={() => handleAdd(item)}>
            <img
              src={`${imgPath}/${item.food_image}`}
              alt=""
              className="w-[80%] mx-auto mb-2"
            />
            <h6 className="font-bold text-sm">{item.food_title}</h6>
            <p className="text-sm">P {item.food_price}</p>
          </button>
        ))}
    </div>
  );
};

export default MenuList;
