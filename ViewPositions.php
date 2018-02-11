		<asp:ContentPlaceHolder ID="ContentPlaceHolder1" runat="server">
            <asp:SiteMapDataSource ID="SiteMapDataSourceMenu" runat="server" ShowStartingNode="false"/>
            <asp:SiteMapDataSource ID="SiteMapDataSourceTree" runat="server"/>
            <asp:Menu ID="MenuCtrl" DataSourceID="SiteMapDataSourceMenu" runat="server" Orientation="Horizontal"></asp:Menu>
            <asp:TreeView ID="TreeView1" runat="server" DataSourceID="SiteMapDataSourceTree"></asp:TreeView>
            <asp:SiteMapPath ID="SiteMapPath1" runat="server"></asp:SiteMapPath>
        </asp:ContentPlaceHolder>
		
		
		<siteMapNode url="-/Default.aspx" title="Home"  description="Home">
      <siteMapNode url="-/SearchCustomer.aspx" title="Search Customers"  description="Search Customers">
        <siteMapNode url="-/CustomerDetail.aspx" title="Customer Details"  description="Customer Details"/>
      </siteMapNode>
      <siteMapNode url="-/NewCustomer.aspx" title="New Customer"  description="New Customer"/>
      <siteMapNode url="-/LogCall.aspx" title="Log Call"  description="Log Call"/>
      <siteMapNode url="-/Reports.aspx" title="Reports"  description="Reports">
        <siteMapNode url="-/IssuePriority.aspx" title="Issues By Priority"  description="Issues By Priority"/>
        <siteMapNode url="-/CustomerSupport.aspx" title="Customer Call Support"  description="Customer Call Support"/>
        <siteMapNode url="-/ActivityReport.aspx" title="Activities Report"  description="Activities Report"/>
      </siteMapNode>
    </siteMapNode>