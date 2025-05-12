import { Badge } from "@/components/ui/badge";
import { Button } from "@/components/ui/button";
import { Card, CardContent, CardDescription, CardFooter, CardHeader, CardTitle } from "@/components/ui/card";
import { Check, X, AlertCircle, ArrowRight } from "lucide-react";

const Premium = () => {
  const features = {
    basic: [
      "Access to basic market data",
      "Limited stock recommendations",
      "Daily market summaries",
      "Basic portfolio tracking",
      "Access to public news updates",
    ],
    pro: [
      "Everything in Basic",
      "Detailed stock analysis reports",
      "Priority email support",
      "Personalized stock recommendations",
      "Enhanced portfolio analytics",
      "Advanced market data",
      "1 free one-on-one consultation per month",
    ],
    elite: [
      "Everything in Pro",
      "Exclusive investment opportunities",
      "Unlimited one-on-one consultations",
      "Priority access to investment events",
      "Direct line to senior advisors",
      "Custom investment strategies",
      "Weekly performance reports",
      "Early access to IPO opportunities",
      "Tax planning assistance",
    ],
  };

  const pricingPlans = [
    {
      name: "Basic",
      price: "Free",
      description: "Essential tools for casual investors",
      buttonText: "Current Plan",
      buttonVariant: "outline" as const,
      disabled: true,
      features: features.basic,
      notFeatures: [
        "Personalized recommendations", 
        "One-on-one consultations", 
        "Advanced analytics"
      ],
    },
    {
      name: "Pro",
      price: "$29.99",
      period: "monthly",
      description: "Perfect for active investors",
      buttonText: "Upgrade to Pro",
      buttonVariant: "default" as const,
      disabled: false,
      popular: true,
      features: features.pro,
      notFeatures: [
        "Unlimited consultations", 
        "Early IPO access"
      ],
    },
    {
      name: "Elite",
      price: "$99.99",
      period: "monthly",
      description: "For serious investment professionals",
      buttonText: "Upgrade to Elite",
      buttonVariant: "outline" as const,
      disabled: false,
      features: features.elite,
      notFeatures: [],
    },
  ];

  const testimonials = [
    {
      quote: "The premium features have completely transformed how I approach investing on the ZSE. The personalized recommendations are consistently accurate.",
      name: "Tendai M.",
      role: "Private Investor",
      location: "Harare",
    },
    {
      quote: "As someone new to the Zimbabwe Stock Exchange, the one-on-one consultations with expert advisors helped me navigate the market with confidence.",
      name: "Chipo R.",
      role: "Business Owner",
      location: "Bulawayo",
    },
    {
      quote: "The Elite plan's early access to IPO opportunities has been invaluable. I've seen exceptional returns on investments that I wouldn't have known about otherwise.",
      name: "Farai T.",
      role: "Portfolio Manager",
      location: "Mutare",
    },
  ];

  const frequentlyAskedQuestions = [
    {
      question: "Can I upgrade or downgrade my plan at any time?",
      answer: "Yes, you can change your subscription plan at any time. If you upgrade, you'll be charged the prorated difference. If you downgrade, the change will take effect at the end of your current billing cycle."
    },
    {
      question: "How do I schedule the free consultations included in premium plans?",
      answer: "You can schedule your included consultations through the 'One on One' section of the platform. Premium members receive priority booking slots."
    },
    {
      question: "What payment methods do you accept?",
      answer: "We accept all major credit cards, debit cards, mobile money payments, and bank transfers for premium subscriptions."
    },
    {
      question: "Is there a discount for annual subscriptions?",
      answer: "Yes, we offer a 20% discount for users who choose to pay annually instead of monthly."
    },
  ];

  return (
    <div className="space-y-10">
      <div className="text-center">
        <h2 className="text-4xl font-bold text-zimstock-blue">Premium Features</h2>
        <p className="text-xl text-muted-foreground mt-2">
          Unlock advanced tools and personalized advice to maximize your investment potential
        </p>
      </div>

      <div className="grid grid-cols-1 md:grid-cols-3 gap-6 mt-12">
        {pricingPlans.map((plan, index) => (
          <Card key={index} className={`relative overflow-hidden ${plan.popular ? "border-2 border-zimstock-green shadow-lg" : ""}`}>
            {plan.popular && (
              <div className="absolute top-0 right-0">
                <Badge className="rounded-bl-md rounded-tr-md rounded-tl-none rounded-br-none bg-zimstock-green">Most Popular</Badge>
              </div>
            )}
            <CardHeader>
              <CardTitle className="text-2xl">{plan.name}</CardTitle>
              <div className="mt-4">
                <span className="text-4xl font-bold">{plan.price}</span>
                {plan.period && <span className="text-muted-foreground">/{plan.period}</span>}
              </div>
              <CardDescription className="text-base mt-2">{plan.description}</CardDescription>
            </CardHeader>
            <CardContent className="space-y-4">
              <ul className="space-y-2">
                {plan.features.map((feature, i) => (
                  <li key={i} className="flex items-start">
                    <Check className="h-5 w-5 text-green-600 mr-2 mt-0.5 flex-shrink-0" />
                    <span>{feature}</span>
                  </li>
                ))}
                {plan.notFeatures.map((feature, i) => (
                  <li key={i} className="flex items-start text-muted-foreground">
                    <X className="h-5 w-5 text-red-600 mr-2 mt-0.5 flex-shrink-0" />
                    <span>{feature}</span>
                  </li>
                ))}
              </ul>
            </CardContent>
            <CardFooter>
              <Button 
                className={`w-full ${plan.buttonVariant === "default" ? "bg-zimstock-green hover:bg-zimstock-green/90" : ""}`}
                variant={plan.buttonVariant}
                disabled={plan.disabled}
              >
                {plan.buttonText}
              </Button>
            </CardFooter>
          </Card>
        ))}
      </div>

      <div className="bg-gradient-to-r from-zimstock-blue to-zimstock-lightblue rounded-lg text-white p-8 my-12">
        <div className="max-w-3xl mx-auto text-center">
          <h3 className="text-2xl font-bold mb-4">Unlock the Full Potential of Your Investments</h3>
          <p className="text-lg mb-6">
            Join thousands of investors who have enhanced their ZSE performance with our premium features.
            Get personalized recommendations, expert guidance, and exclusive market insights.
          </p>
          <Button size="lg" className="bg-white text-zimstock-blue hover:bg-gray-100">
            Upgrade Now <ArrowRight className="ml-2 h-4 w-4" />
          </Button>
        </div>
      </div>

      <div>
        <h3 className="text-2xl font-bold text-center mb-8">What Our Premium Members Say</h3>
        <div className="grid grid-cols-1 md:grid-cols-3 gap-6">
          {testimonials.map((testimonial, index) => (
            <Card key={index} className="bg-gray-50">
              <CardContent className="pt-6">
                <div className="mb-4">
                  {[1, 2, 3, 4, 5].map((star) => (
                    <span key={star} className="text-yellow-500 text-lg">★</span>
                  ))}
                </div>
                <p className="italic">"{testimonial.quote}"</p>
                <div className="mt-4">
                  <p className="font-medium">{testimonial.name}</p>
                  <p className="text-sm text-muted-foreground">{testimonial.role}, {testimonial.location}</p>
                </div>
              </CardContent>
            </Card>
          ))}
        </div>
      </div>

      <div>
        <h3 className="text-2xl font-bold text-center mb-8">Premium Features Comparison</h3>
        <div className="overflow-x-auto">
          <table className="w-full border-collapse">
            <thead>
              <tr className="bg-gray-100">
                <th className="p-4 text-left">Feature</th>
                <th className="p-4 text-center">Basic</th>
                <th className="p-4 text-center">Pro</th>
                <th className="p-4 text-center">Elite</th>
              </tr>
            </thead>
            <tbody>
              <tr className="border-t">
                <td className="p-4">Market Data Access</td>
                <td className="p-4 text-center">Basic</td>
                <td className="p-4 text-center">Advanced</td>
                <td className="p-4 text-center">Complete</td>
              </tr>
              <tr className="border-t">
                <td className="p-4">Stock Recommendations</td>
                <td className="p-4 text-center">Limited</td>
                <td className="p-4 text-center">Personalized</td>
                <td className="p-4 text-center">Advanced Personalized</td>
              </tr>
              <tr className="border-t">
                <td className="p-4">Portfolio Analysis</td>
                <td className="p-4 text-center">Basic</td>
                <td className="p-4 text-center">Enhanced</td>
                <td className="p-4 text-center">Comprehensive</td>
              </tr>
              <tr className="border-t">
                <td className="p-4">One-on-One Consultations</td>
                <td className="p-4 text-center">
                  <X className="h-5 w-5 text-red-600 mx-auto" />
                </td>
                <td className="p-4 text-center">1 per month</td>
                <td className="p-4 text-center">Unlimited</td>
              </tr>
              <tr className="border-t">
                <td className="p-4">Market News</td>
                <td className="p-4 text-center">Public Only</td>
                <td className="p-4 text-center">Premium Content</td>
                <td className="p-4 text-center">Premium + Analysis</td>
              </tr>
              <tr className="border-t">
                <td className="p-4">IPO Opportunities</td>
                <td className="p-4 text-center">
                  <X className="h-5 w-5 text-red-600 mx-auto" />
                </td>
                <td className="p-4 text-center">
                  <X className="h-5 w-5 text-red-600 mx-auto" />
                </td>
                <td className="p-4 text-center">
                  <Check className="h-5 w-5 text-green-600 mx-auto" />
                </td>
              </tr>
              <tr className="border-t">
                <td className="p-4">Customer Support</td>
                <td className="p-4 text-center">Standard</td>
                <td className="p-4 text-center">Priority Email</td>
                <td className="p-4 text-center">Direct Line</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

      <div className="mt-12">
        <h3 className="text-2xl font-bold text-center mb-8">Frequently Asked Questions</h3>
        <div className="grid grid-cols-1 md:grid-cols-2 gap-6">
          {frequentlyAskedQuestions.map((faq, index) => (
            <Card key={index}>
              <CardHeader>
                <CardTitle className="text-lg">{faq.question}</CardTitle>
              </CardHeader>
              <CardContent>
                <p>{faq.answer}</p>
              </CardContent>
            </Card>
          ))}
        </div>
      </div>

      <Card className="border-2 border-dashed border-zimstock-blue p-6 mt-12">
        <div className="flex flex-col md:flex-row items-center gap-6">
          <div className="flex-shrink-0">
            <div className="w-16 h-16 rounded-full bg-zimstock-blue/10 flex items-center justify-center">
              <AlertCircle className="h-8 w-8 text-zimstock-blue" />
            </div>
          </div>
          <div className="flex-grow">
            <h3 className="text-xl font-bold mb-2">Need Help Deciding?</h3>
            <p className="text-muted-foreground">
              Our team is ready to help you choose the right plan for your investment needs. 
              Get in touch for a free consultation to discuss which features would benefit you the most.
            </p>
          </div>
          <div className="flex-shrink-0">
            <Button>Contact Us</Button>
          </div>
        </div>
      </Card>
    </div>
  );
};

export default Premium;