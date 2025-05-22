import { QueryClient, QueryClientProvider } from "@tanstack/react-query";
import { Route, BrowserRouter as Router, Routes, Navigate } from "react-router-dom";
import Category from "./components/pages/backend/category/Category";
import Foods from "./components/pages/backend/foods/Foods";
import Branches from "./components/pages/backend/branches/Branches";
import { StoreProvider } from "./components/store/storeContext";

const App = () => {
  const queryClient = new QueryClient();
  return (
    <QueryClientProvider client={queryClient}>
      <StoreProvider>
        <Router>
          <Routes>
            <Route path="/" element={<Navigate to="/admin/foods" />} />
            <Route path="/admin/foods" element={<Foods />} />
            <Route path="/admin/category" element={<Category />} />
            <Route path="/admin/branches" element={<Branches />} />
            <Route path="*" element={<h1>404 - Page Not Found</h1>} />
          </Routes>
        </Router>
      </StoreProvider>
    </QueryClientProvider>
  );
};

export default App;
