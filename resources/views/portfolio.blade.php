
import { useState } from "react";
import { Card, CardContent, CardDescription, CardFooter, CardHeader, CardTitle } from "@/components/ui/card";
import { Button } from "@/components/ui/button";
import { Tabs, TabsContent, TabsList, TabsTrigger } from "@/components/ui/tabs";
import { Table, TableBody, TableCell, TableHead, TableHeader, TableRow } from "@/components/ui/table";
import { PieChart, Pie, ResponsiveContainer, Cell, Legend, Tooltip } from "recharts";
import { LineChart, Line, XAxis, YAxis, CartesianGrid } from "recharts";
import { Plus, Download, Upload, Pencil, Trash, AlertCircle } from "lucide-react";

const Portfolio = () => {
  const [watchlist, setWatchlist] = useState([
    { symbol: "DLTA", name: "Delta Corporation", price: 312.50, change: 4.25, changePercent: 1.38, alert: "above $320" },
    { symbol: "ECOZ", name: "Econet Wireless", price: 178.25, change: -2.75, changePercent: -1.52, alert: "below $175" },
    { symbol: "INNH", name: "Innscor Africa", price: 423.00, change: 8.50, changePercent: 2.05, alert: "none" },
    { symbol: "SEED", name: "SeedCo Limited", price: 89.75, change: 1.25, changePercent: 1.41, alert: "none" },
    { symbol: "PPCZ", name: "PPC Limited", price: 124.60, change: -1.40, changePercent: -1.11, alert: "none" },
  ]);

  // Sample portfolio data
  const portfolioStocks = [
    { symbol: "DLTA", name: "Delta Corporation", shares: 500, avgCost: 280.25, currentPrice: 312.50, marketValue: 156250, gain: 16125, gainPercent: 11.51 },
    { symbol: "ECOZ", name: "Econet Wireless", shares: 800, avgCost: 190.50, currentPrice: 178.25, marketValue: 142600, gain: -9800, gainPercent: -6.43 },
    { symbol: "INNH", name: "Innscor Africa", shares: 300, avgCost: 395.75, currentPrice: 423.00, marketValue: 126900, gain: 8175, gainPercent: 6.88 },
    { symbol: "SEED", name: "SeedCo Limited", shares: 1200, avgCost: 82.50, currentPrice: 89.75, marketValue: 107700, gain: 8700, gainPercent: 8.79 },
  ];

  // Calculate total portfolio value and gain/loss
  const totalValue = portfolioStocks.reduce((sum, stock) => sum + stock.marketValue, 0);
  const totalGain = portfolioStocks.reduce((sum, stock) => sum + stock.gain, 0);
  const totalGainPercent = (totalGain / (totalValue - totalGain)) * 100;

  // Portfolio allocation data for pie chart
  const portfolioAllocation = portfolioStocks.map(stock => ({
    name: stock.symbol,
    value: stock.marketValue,
  }));

  const COLORS = ['#0088FE', '#00C49F', '#FFBB28', '#FF8042', '#8884d8', '#82ca9d'];

  // Portfolio performance over time (sample data)
  const performanceData = [
    { month: 'Jan', value: 500000 },
    { month: 'Feb', value: 520000 },
    { month: 'Mar', value: 510000 },
    { month: 'Apr', value: 540000 },
    { month: 'May', value: 533450 },
  ];

  // Transaction history (sample data)
  const transactionHistory = [
    { date: "12 May 2025", type: "Buy", symbol: "DLTA", shares: 100, price: 312.50, total: 31250 },
    { date: "05 May 2025", type: "Sell", symbol: "PPCZ", shares: 200, price: 126.00, total: 25200 },
    { date: "28 Apr 2025", type: "Buy", symbol: "SEED", shares: 500, price: 88.50, total: 44250 },
    { date: "15 Apr 2025", type: "Buy", symbol: "INNH", shares: 150, price: 415.25, total: 62287.50 },
    { date: "03 Apr 2025", type: "Sell", symbol: "ECOZ", shares: 300, price: 185.75, total: 55725 },
  ];

  return (
    <div className="space-y-6">
      <div className="flex justify-between items-center">
        <div>
          <h2 className="text-3xl font-bold text-zimstock-blue">Portfolio Tracker</h2>
          <p className="text-muted-foreground">Monitor your investments and track performance</p>
        </div>
        <div className="flex gap-3">
          <Button variant="outline" className="flex items-center gap-2">
            <Upload className="h-4 w-4" />
            <span>Import</span>
          </Button>
          <Button variant="outline" className="flex items-center gap-2">
            <Download className="h-4 w-4" />
            <span>Export</span>
          </Button>
          <Button className="flex items-center gap-2 bg-zimstock-green hover:bg-zimstock-green/90">
            <Plus className="h-4 w-4" />
            <span>Add Position</span>
          </Button>
        </div>
      </div>

      <div className="grid grid-cols-1 md:grid-cols-3 gap-6">
        <Card>
          <CardHeader className="pb-2">
            <CardTitle className="text-lg">Portfolio Value</CardTitle>
          </CardHeader>
          <CardContent>
            <div className="text-3xl font-bold">${totalValue.toLocaleString()}</div>
            <div className={`flex items-center mt-1 ${totalGain >= 0 ? 'text-green-600' : 'text-red-600'}`}>
              <span>{totalGain >= 0 ? '+' : ''}{totalGain.toLocaleString()} ({totalGainPercent.toFixed(2)}%)</span>
            </div>
          </CardContent>
        </Card>
        
        <Card>
          <CardHeader className="pb-2">
            <CardTitle className="text-lg">Today's Change</CardTitle>
          </CardHeader>
          <CardContent>
            <div className="text-3xl font-bold text-green-600">+$4,235.50</div>
            <div className="text-green-600 mt-1">
              +0.84%
            </div>
          </CardContent>
        </Card>
        
        <Card>
          <CardHeader className="pb-2">
            <CardTitle className="text-lg">Annual Return</CardTitle>
          </CardHeader>
          <CardContent>
            <div className="text-3xl font-bold">12.75%</div>
            <div className="text-muted-foreground mt-1">
              Last updated: 12 May 2025
            </div>
          </CardContent>
        </Card>
      </div>

      <div className="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div className="lg:col-span-2">
          <Card className="h-full">
            <CardHeader>
              <CardTitle>Portfolio Holdings</CardTitle>
              <CardDescription>Your current stock positions</CardDescription>
            </CardHeader>
            <CardContent>
              <Table>
                <TableHeader>
                  <TableRow>
                    <TableHead>Symbol</TableHead>
                    <TableHead>Company</TableHead>
                    <TableHead className="text-right">Shares</TableHead>
                    <TableHead className="text-right">Avg Cost</TableHead>
                    <TableHead className="text-right">Current Price</TableHead>
                    <TableHead className="text-right">Market Value</TableHead>
                    <TableHead className="text-right">Gain/Loss</TableHead>
                    <TableHead></TableHead>
                  </TableRow>
                </TableHeader>
                <TableBody>
                  {portfolioStocks.map((stock) => (
                    <TableRow key={stock.symbol}>
                      <TableCell className="font-medium">{stock.symbol}</TableCell>
                      <TableCell>{stock.name}</TableCell>
                      <TableCell className="text-right">{stock.shares}</TableCell>
                      <TableCell className="text-right">${stock.avgCost.toFixed(2)}</TableCell>
                      <TableCell className="text-right">${stock.currentPrice.toFixed(2)}</TableCell>
                      <TableCell className="text-right">${stock.marketValue.toLocaleString()}</TableCell>
                      <TableCell className={`text-right ${stock.gain >= 0 ? 'text-green-600' : 'text-red-600'}`}>
                        {stock.gain >= 0 ? '+' : ''}{stock.gain.toLocaleString()} ({stock.gain >= 0 ? '+' : ''}{stock.gainPercent.toFixed(2)}%)
                      </TableCell>
                      <TableCell>
                        <div className="flex items-center gap-2">
                          <Button variant="ghost" size="icon">
                            <Pencil className="h-4 w-4" />
                          </Button>
                          <Button variant="ghost" size="icon">
                            <Trash className="h-4 w-4" />
                          </Button>
                        </div>
                      </TableCell>
                    </TableRow>
                  ))}
                </TableBody>
              </Table>
            </CardContent>
            <CardFooter className="bg-gray-50 border-t flex justify-between">
              <div>
                <span className="font-medium">Total:</span> ${totalValue.toLocaleString()}
              </div>
              <div className={totalGain >= 0 ? 'text-green-600' : 'text-red-600'}>
                <span className="font-medium">Total Gain/Loss:</span> {totalGain >= 0 ? '+' : ''}{totalGain.toLocaleString()} ({totalGainPercent.toFixed(2)}%)
              </div>
            </CardFooter>
          </Card>
        </div>

        <div>
          <Card className="h-full">
            <CardHeader>
              <CardTitle>Portfolio Allocation</CardTitle>
            </CardHeader>
            <CardContent>
              <div className="h-[250px]">
                <ResponsiveContainer width="100%" height="100%">
                  <PieChart>
                    <Pie
                      data={portfolioAllocation}
                      cx="50%"
                      cy="50%"
                      labelLine={false}
                      outerRadius={80}
                      fill="#8884d8"
                      dataKey="value"
                      label={({name}) => name}
                    >
                      {portfolioAllocation.map((entry, index) => (
                        <Cell key={`cell-${index}`} fill={COLORS[index % COLORS.length]} />
                      ))}
                    </Pie>
                    <Tooltip 
                      formatter={(value) => [`$${Number(value).toLocaleString()}`, 'Value']} 
                    />
                    <Legend />
                  </PieChart>
                </ResponsiveContainer>
              </div>
              
              <div className="mt-4 space-y-2">
                <div className="flex justify-between">
                  <span className="text-muted-foreground">Diversification Score:</span>
                  <span className="font-medium">7.5/10</span>
                </div>
                <div className="flex justify-between">
                  <span className="text-muted-foreground">Risk Level:</span>
                  <span className="font-medium text-yellow-600">Moderate</span>
                </div>
              </div>
            </CardContent>
          </Card>
        </div>
      </div>

      <Card>
        <CardHeader>
          <CardTitle>Portfolio Performance</CardTitle>
          <CardDescription>Value change over time</CardDescription>
        </CardHeader>
        <CardContent>
          <div className="h-[300px]">
            <ResponsiveContainer width="100%" height="100%">
              <LineChart
                data={performanceData}
                margin={{
                  top: 5,
                  right: 30,
                  left: 20,
                  bottom: 5,
                }}
              >
                <CartesianGrid strokeDasharray="3 3" vertical={false} />
                <XAxis dataKey="month" />
                <YAxis />
                <Tooltip formatter={(value) => [`$${Number(value).toLocaleString()}`, 'Value']} />
                <Line type="monotone" dataKey="value" stroke="#3182ce" strokeWidth={2} dot={{ r: 6 }} />
              </LineChart>
            </ResponsiveContainer>
          </div>
        </CardContent>
      </Card>

      <Tabs defaultValue="watchlist">
        <TabsList>
          <TabsTrigger value="watchlist">Watchlist</TabsTrigger>
          <TabsTrigger value="transactions">Transaction History</TabsTrigger>
        </TabsList>
        
        <TabsContent value="watchlist">
          <Card>
            <CardHeader className="flex flex-row items-center justify-between">
              <div>
                <CardTitle>Watchlist</CardTitle>
                <CardDescription>Stocks you're monitoring</CardDescription>
              </div>
              <Button className="flex items-center gap-2">
                <Plus className="h-4 w-4" />
                <span>Add Stock</span>
              </Button>
            </CardHeader>
            <CardContent>
              <Table>
                <TableHeader>
                  <TableRow>
                    <TableHead>Symbol</TableHead>
                    <TableHead>Company</TableHead>
                    <TableHead className="text-right">Price</TableHead>
                    <TableHead className="text-right">Change</TableHead>
                    <TableHead>Alert</TableHead>
                    <TableHead></TableHead>
                  </TableRow>
                </TableHeader>
                <TableBody>
                  {watchlist.map((stock) => (
                    <TableRow key={stock.symbol}>
                      <TableCell className="font-medium">{stock.symbol}</TableCell>
                      <TableCell>{stock.name}</TableCell>
                      <TableCell className="text-right">${stock.price.toFixed(2)}</TableCell>
                      <TableCell className={`text-right ${stock.change >= 0 ? 'text-green-600' : 'text-red-600'}`}>
                        {stock.change >= 0 ? '+' : ''}{stock.change.toFixed(2)} ({stock.change >= 0 ? '+' : ''}{stock.changePercent.toFixed(2)}%)
                      </TableCell>
                      <TableCell>
                        {stock.alert !== "none" && (
                          <div className="flex items-center">
                            <AlertCircle className="h-4 w-4 text-amber-500 mr-2" />
                            <span className="text-sm">{stock.alert}</span>
                          </div>
                        )}
                      </TableCell>
                      <TableCell>
                        <div className="flex items-center gap-2">
                          <Button variant="ghost" size="icon">
                            <Pencil className="h-4 w-4" />
                          </Button>
                          <Button variant="ghost" size="icon">
                            <Trash className="h-4 w-4" />
                          </Button>
                        </div>
                      </TableCell>
                    </TableRow>
                  ))}
                </TableBody>
              </Table>
            </CardContent>
          </Card>
        </TabsContent>
        
        <TabsContent value="transactions">
          <Card>
            <CardHeader>
              <CardTitle>Transaction History</CardTitle>
              <CardDescription>Record of your past trades</CardDescription>
            </CardHeader>
            <CardContent>
              <Table>
                <TableHeader>
                  <TableRow>
                    <TableHead>Date</TableHead>
                    <TableHead>Type</TableHead>
                    <TableHead>Symbol</TableHead>
                    <TableHead className="text-right">Shares</TableHead>
                    <TableHead className="text-right">Price</TableHead>
                    <TableHead className="text-right">Total</TableHead>
                    <TableHead></TableHead>
                  </TableRow>
                </TableHeader>
                <TableBody>
                  {transactionHistory.map((transaction, index) => (
                    <TableRow key={index}>
                      <TableCell>{transaction.date}</TableCell>
                      <TableCell className={transaction.type === "Buy" ? "text-green-600" : "text-red-600"}>
                        {transaction.type}
                      </TableCell>
                      <TableCell className="font-medium">{transaction.symbol}</TableCell>
                      <TableCell className="text-right">{transaction.shares}</TableCell>
                      <TableCell className="text-right">${transaction.price.toFixed(2)}</TableCell>
                      <TableCell className="text-right">${transaction.total.toLocaleString()}</TableCell>
                      <TableCell>
                        <Button variant="ghost" size="icon">
                          <Pencil className="h-4 w-4" />
                        </Button>
                      </TableCell>
                    </TableRow>
                  ))}
                </TableBody>
              </Table>
            </CardContent>
            <CardFooter className="bg-gray-50 border-t">
              <Button variant="outline">View All Transactions</Button>
            </CardFooter>
          </Card>
        </TabsContent>
      </Tabs>
    </div>
  );
};

export default Portfolio;