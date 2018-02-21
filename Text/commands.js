import { KaiYiBot } from "../bot";

KaiYiBot.onText(/\/test/, (msg) => {
  const chatId = msg.chat.id;
  KaiYiBot.sendMessage(chatId, "Working!");
})