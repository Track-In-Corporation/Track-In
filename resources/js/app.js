import "./bootstrap";
import "./layout/index.js";
import "./preloader.js";
import { QueryClient } from "./query-client.js";

import "./pages/inventory/init.js";

import "./pages/transaction/init.js";

import "./pages/users/init.js";
import "./pages/users/update-user.js";
import "./pages/users/update-image.js";

import "./components/window.js";
import "./components/dropdown.js";
import "./components/input-dropdown.js";
import "./components/user-selector.js";
import "./components/delete-modal.js";
import { Toast } from "./components/toast.js";

// setTimeout(() => QueryClient.publish("users"), 0);
