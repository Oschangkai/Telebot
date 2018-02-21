// Module variables
const HOST = process.env.HOST || "0.0.0.0";
const URL = process.env.URL || "https://kaiyi-tgbot.herokuapp.com";
const PORT = process.env.PORT || 443;

const TKN_KYB = process.env.TOKEN_KAIYI_BOT;
const TKN_FYZKYB = process.env.TOKEN_FORYZU_KAIYI_BOT;
const OPTS = {
  webHook: {
    port: PORT,
    host: HOST
  }
}

const URL_MONGODB = process.env.MONGODB_URL;



if (!TKN_KYB) {
  console.error("Err: KYB Token missing!");
  process.exit(1);
}
if (!TKN_FYZKYB) {
  console.error("Err: FYZKYB Token missing!");
  process.exit(1);
}
if (!URL_MONGODB) {
  console.error("Err: MongoDB URL missing!");
  process.exit(1);
}



// Exports Variables
module.exports = {
  HOST, PORT, URL,
  TKN_KYB, TKN_FYZKYB, OPTS,
  URL_MONGODB
}